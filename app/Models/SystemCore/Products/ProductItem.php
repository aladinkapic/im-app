<?php

namespace App\Models\SystemCore\Products;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model{
    protected $table = 'products__item';
    protected $guarded = ['id'];


    public function AffKeyword($keyword){
        return $this->hasOne(ProductItemAffiliation::class, 'item_id', 'id')->where('keyword', $keyword)->first()->keyword_value ?? '0';
    }

    public function AffiliationRel(){
        return $this->hasMany(ProductItemAffiliation::class, 'item_id', 'id')->orderBy('id');
    }

}
