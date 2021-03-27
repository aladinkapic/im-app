<?php

namespace App\Models\SystemCore\Products\Shipping;

use App\Models\SystemCore\Core\Countries;
use App\Models\SystemCore\Settings\Keywords;
use Illuminate\Database\Eloquent\Model;

class ShippingPrice extends Model{
    protected $table = 'shipping__prices';
    protected $guarded = ['id'];

    public function formattedPrice(){
        return number_format((float)$this->price, 2, '.', '');
    }


    public function countryRel(){
        return $this->hasOne(Countries::class, 'id', 'country');
    }
    public function currencyRel(){
        return $this->hasOne(Keywords::class, 'id', 'currency');
    }
}
