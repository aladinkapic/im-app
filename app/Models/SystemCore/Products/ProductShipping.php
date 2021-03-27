<?php

namespace App\Models\SystemCore\Products;

use App\Models\SystemCore\Products\Shipping\Shipping;
use Illuminate\Database\Eloquent\Model;

class ProductShipping extends Model{
    protected $table = 'products__shipping';
    protected $guarded = ['id'];

    public function shippingRel(){
        return $this->hasOne(Shipping::class, 'id', 'shipping_id');
    }
}
