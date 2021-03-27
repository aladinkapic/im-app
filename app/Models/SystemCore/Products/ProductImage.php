<?php

namespace App\Models\SystemCore\Products;

use App\Models\SystemCore\Core\File;
use App\Models\SystemCore\Settings\Keywords;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model{
    protected $table = 'products__images';
    protected $guarded = ['id'];

    public function colorRel(){
        return $this->hasOne(Keywords::class, 'id', 'color_id');
    }
    public function fileRel(){
        return $this->hasOne(File::class, 'id', 'image_id');
    }

    public function getUCI($product_id){ // Get unique color images -- public part for color-picker
        $images = ProductImage::where('product_id', $product_id)->get();
    }
}
