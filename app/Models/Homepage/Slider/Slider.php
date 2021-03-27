<?php

namespace App\Models\Homepage\Slider;

use App\Models\SystemCore\Core\File;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model{
    protected $table = 'homepage__slider';
    protected $guarded = ['id'];

    public function imageRel(){
        return $this->hasOne(File::class, 'id', 'image');
    }
    public function mobileImageRel(){
        return $this->hasOne(File::class, 'id', 'image_mobile');
    }
}
