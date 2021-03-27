<?php

namespace App\Models\systemCore\Products;

use App\Models\SystemCore\Settings\Keywords;
use App\Models\SystemCore\Settings\KeywordsModule;
use Illuminate\Database\Eloquent\Model;

class ProductItemAffiliation extends Model{
    protected $table = 'products__item__affiliation';
    protected $guarded = ['id'];

    public function keywordRel(){
        return $this->hasOne(Keywords::class, 'id', 'keyword_value');
    }
    public function keywordModuleRel(){
        return $this->hasOne(KeywordsModule::class, 'id', 'keyword');
    }
}
