<?php

namespace App\Models\OrderingSystem;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicPart\CartController;
use App\Models\SystemCore\Products\Product;
use App\Models\SystemCore\Products\ProductItem;
use App\Models\SystemCore\Products\ProductPrice;
use App\Models\SystemCore\Settings\Keywords;
use App\Models\SystemCore\Settings\KeywordsModule;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    protected $table = 'cart';
    protected $guarded = ['id'];
    protected $_query, $_attributes, $_properties = array();
    protected $_price = 0, $_total = 0, $_quantity, $_note = '';

    public function productRel(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function formattedPrice(){
        return number_format((float)$this->price, 2, '.', '');
    }
    public function formattedCustomPrice(){
        return number_format((float)$this->custom_price, 2, '.', '');
    }
    public function getSystemPrice(){
        if($this->custom_price == 0 or $this->custom_price == null) return $this->formattedPrice();
        else return $this->formattedCustomPrice();
    }
    public function getCustomPrice($percentage = 1, $quantity = false){
        if($this->custom_price == 0 or $this->custom_price == null) $price = $this->formattedPrice();
        else $price = $this->formattedCustomPrice();
        $quantity = $quantity ? $this->quantity : 1;
        return number_format((float)($price * $percentage * $quantity), 2, '.', '');
    }

    public function itemRel(){
        return $this->hasOne(ProductItem::class, 'cart_id', 'id');
    }

    public function getItemProperties(){
        $this->_attributes = json_decode($this->product_property);

        $loggedUser = (new Controller())::getUserModel();

        $count = (new ProductItem())->query(); // Make a query for item
        foreach ($this->_attributes as $key => $value){
            $count->whereHas('AffiliationRel', function ($query) use ($value){
                $query->where('keyword_value', $value);
            });

            try{
                $priceModel = ProductPrice::where('product_id', $this->product_id)
                    ->where('keyword_module', $key)
                    ->where('keyword_value', $value)
                    ->first();
                if($priceModel) $this->_price += (float) (($loggedUser and $loggedUser->partner == 'Yes') ? $priceModel->price_wp : $priceModel->price );
            }catch (\Exception $e){}

            // Set properties for particular item
            try{
                array_push($this->_properties, array(
                    'module' => KeywordsModule::where('id', $key)->first('public_title')->public_title ?? '',
                    'value'  => Keywords::where('id', $value)->first('title')->title ?? ''
                ));
            }catch (\Exception $e){}
        }
        return $count;
    }

    // ** Get data for device and check if there is any available ** //
    public function getInfo(){
        // ** This is used to check is it going to display price or wholesale price ** //
        $loggedUser = (new Controller())::getUserModel();

        // ** Get item (device) properties - color, features, etc.. ** //
        $count = $this->getItemProperties();

        try{
            $product = Product::where('id', $this->product_id)->firstOrFail();
            $this->_price += (float) (($loggedUser and $loggedUser->partner == 'Yes') ? $product->price_wp : $product->price );
            $this->_price = ($this->_price * $product->price_percentage / 100);
        }catch (\Exception $e){}

        $this->_query = $count->where('product_id', $this->product_id)->where('reserved_by', null);
        $this->_total = $this->_query->count();

        // Get quantity of devices in cart
        $this->_quantity = $this->quantity;

        if($this->_quantity > $this->_total){
            try{
                CartController::updateQuantity($this->id, $this->_total);
            }catch (\Exception $e){dd($e);}
            // ** Set note ** //
            $this->_note = __('Napomena: Maksimalan broj dostupnih uređaja je ').$this->_total;
        }

        if($this->_total > 0) return true;
        return false;
    }
    // ** Price of this particular device ** //
    public function getPrice(){
        return number_format((float)$this->_price, 2, '.', '').' '.(new Controller())->getCurrency();
    }
    public function getOnlyPrice(){return $this->_price; }
    public function getQuantity(){return $this->_quantity;}
    public function getNote(){return $this->_note;}
    public function getQuery(){return $this->_query;}
    // ** Number of available devices ** //
    public function getTotal(){ return $this->_total;}
    public function getProperties(){return $this->_properties; }
}
