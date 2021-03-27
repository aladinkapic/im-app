<?php

namespace App\Models\SystemCore\Products\Shipping;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model{
    protected $table = 'shipping';
    protected $guarded = ['id'];

    public function pricesRel(){
        return $this->hasMany(ShippingPrice::class, 'shipping_id', 'id');
    }
    public function priceRel(){
        return $this->hasOne(ShippingPrice::class, 'shipping_id', 'id');
    }
}
