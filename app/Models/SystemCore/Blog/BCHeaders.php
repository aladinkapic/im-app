<?php

namespace App\Models\SystemCore\Blog;

use Illuminate\Database\Eloquent\Model;

class BCHeaders extends Model{
    protected $table = 'blog__headers';
    protected $guarded = ['id'];

    public function contentRel(){
        return $this->hasOne(BlogContent::class, 'id', 'content_id');
    }
}
