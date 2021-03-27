<?php

namespace App\Models\Homepage\Products;

use App\Models\SystemCore\Core\File;
use App\Models\SystemCore\Products\Product;
use Illuminate\Database\Eloquent\Model;

class MainProduct extends Model{
    protected $table = 'products__main_product';
    protected $guarded = ['id'];

    public function imageRel(){
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function imageObject(){
        return '/'.($this->imageRel->path ?? '').($this->imageRel->file ?? '');
    }
    public function productRel(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
