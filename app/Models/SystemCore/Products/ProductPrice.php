<?php

namespace App\Models\SystemCore\Products;

use App\Models\SystemCore\Settings\Keywords;
use App\Models\SystemCore\Settings\KeywordsModule;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model{
    protected $table = 'products__additional_prices';
    protected $guarded = ['id'];

    public function keywordModuleRel(){
        return $this->hasOne(KeywordsModule::class, 'id', 'keyword_module');
    }
    public function keywordRel(){
        return $this->hasOne(Keywords::class, 'id', 'keyword_value');
    }

    public function formattedPrice(){
        return number_format((float)$this->price, 2, '.', '');
    }
    public function formattedWPrice(){
        return number_format((float)$this->price_wp, 2, '.', '');
    }
}
