<?php

namespace App\Models\SystemCore\Blog;

use App\Models\SystemCore\Core\File;
use Illuminate\Database\Eloquent\Model;

class BCSlider extends Model{
    protected $table = 'blog__slider';
    protected $guarded = ['id'];

    public function imageRel(){
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function imageObject(){
        return '/'.($this->imageRel->path ?? '').($this->imageRel->file ?? '');
    }
}
