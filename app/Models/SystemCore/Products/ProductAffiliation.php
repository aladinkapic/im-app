<?php

namespace App\Models\systemCore\Products;

use App\Models\SystemCore\Settings\Keywords;
use App\Models\SystemCore\Settings\KeywordsModule;
use Illuminate\Database\Eloquent\Model;

class ProductAffiliation extends Model
{
    protected $table = 'products__affiliation';
    protected $guarded = ['id'];

    public function keywordRel(){
        return $this->hasOne(KeywordsModule::class, 'id', 'keyword');
    }
}
