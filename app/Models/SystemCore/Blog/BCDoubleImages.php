<?php

namespace App\Models\SystemCore\Blog;

use App\Models\SystemCore\Core\File;
use Illuminate\Database\Eloquent\Model;

class BCDoubleImages extends Model{
    protected $table = 'blog__double_images';
    protected $guarded = ['id'];

    public function contentRel(){
        return $this->hasOne(BlogContent::class, 'id', 'content_id');
    }

    public function leftImageRel(){
        return $this->hasOne(File::class, 'id', 'image_left');
    }
    public function rightImageRel(){
        return $this->hasOne(File::class, 'id', 'image_right');
    }
}
