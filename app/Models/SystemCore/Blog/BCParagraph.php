<?php

namespace App\Models\SystemCore\Blog;

use Illuminate\Database\Eloquent\Model;

class BCParagraph extends Model{
    protected $table = 'blog__paragraphs';
    protected $guarded = ['id'];

    public function contentRel(){
        return $this->hasOne(BlogContent::class, 'id', 'content_id');
    }
}
