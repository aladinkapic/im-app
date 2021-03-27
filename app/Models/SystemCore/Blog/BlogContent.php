<?php

namespace App\Models\SystemCore\Blog;

use App\Models\SystemCore\Core\File;
use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model{
    protected $table = 'blog__content';
    protected $guarded = ['id'];

    public function postRel(){
        return $this->hasOne(Blog::class, 'id', 'post_id');
    }

    public function headerRel(){
        return $this->hasOne(BCHeaders::class, 'content_id', 'id');
    }

    public function paragraphRel(){
        return $this->hasOne(BCParagraph::class, 'content_id', 'id');
    }

    public function doubleImagesRel(){
        return $this->hasOne(BCDoubleImages::class, 'content_id', 'id');
    }

    public function sliderRel(){
        return $this->hasMany(BCSlider::class, 'content_id', 'id');
    }
}
