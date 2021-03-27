<?php

namespace App\Models\SystemCore\Blog;

use App\Models\SystemCore\Core\File;
use App\Models\SystemCore\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    protected $table = 'blog';
    protected $guarded = ['id'];

    public function categoryRel(){
        return $this->hasOne(BlogCategories::class, 'id', 'category');
    }
    public function ContentRel(){
        return $this->hasMany(BlogContent::class, 'post_id', 'id');
    }
    public function imageRel(){
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function imageObject(){
        return '/'.($this->imageRel->path ?? '').($this->imageRel->file ?? '');
    }
    public function homeImageRel(){
        return $this->hasOne(File::class, 'id', 'home_image_id');
    }
    public function homeImageObject(){
        return '/'.($this->homeImageRel->path ?? '').($this->homeImageRel->file ?? '');
    }
    public function userRel(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    // Example of
    // public function ContentHeaderRel(){
    //     return $this->hasMany(BlogContent::class, 'post_id', 'id')->where('category', 'headers');
    // }
}
