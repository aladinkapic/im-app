<?php

namespace App\Models\SystemCore\Blog;

use App\Models\SystemCore\Core\File;
use App\Models\SystemCore\User;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model{
    protected $table = 'blog__categories';
    protected $guarded = ['id'];

    public function imageRel(){
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function imageObject(){
        return '/'.($this->imageRel->path ?? '').($this->imageRel->file ?? '');
    }
    public function postRel(){
        return $this->hasMany(Blog::class, 'category', 'id')->where('published', 1);
    }
}
