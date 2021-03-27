<?php

namespace App\Models\SystemCore\Products;

use App\Http\Controllers\Controller;
use App\Models\SystemCore\Core\File;
use App\Models\SystemCore\Products\Shipping\Shipping;
use App\Models\SystemCore\Settings\Keywords;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $guarded = ['id'];

    public function formattedPrice(){
        return number_format((float)$this->price, 2, '.', '');
    }
    public function formattedWPrice(){
        return number_format((float)$this->price_wp, 2, '.', '');
    }
    public function getProductPrice(){
        $loggedUser = Controller::getUserModel();
        if($loggedUser){ // First check if user is partner or not
            $price = ($loggedUser->partner == 'Yes') ? $this->price_wp : $this->price;
        }else $price = $this->price_wp;
        return number_format((float)($price * $this->price_percentage / 100), 2, '.', '');
    }


    public function categoryRel(){
        return $this->hasOne(Keywords::class, 'id', 'category');
    }

    // ** Product items ** //
    public function itemRel(){
        return $this->hasMany(ProductItem::class, 'product_id', 'id');
    }

    // ** Product images ** //
    public function homeImgRel(){
        return $this->hasOne(File::class, 'id', 'home_image');
    }
    public function homeImageObject(){
        return '/'.($this->homeImgRel->path ?? '').($this->homeImgRel->file ?? '');
    }
    public function mainImgRel(){
        return $this->hasOne(File::class, 'id', 'main_image');
    }
    public function imagesRel(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function imageRel(){
        return $this->hasOne(ProductImage::class, 'product_id', 'id');
    }

    // ** Product shipping ** //
    public function shippingRel(){
        return $this->hasMany(ProductShipping::class, 'product_id', 'id');
    }
}
