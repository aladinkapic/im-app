<?php

namespace App\Models\SystemCore\Settings;

use Illuminate\Database\Eloquent\Model;

class KeywordsModule extends Model{
    protected $table = '__keywords__module';
    protected $guarded = ['id'];

    public function numberOfInstances(){
        return $this->hasMany(Keywords::class, 'keyword', 'id');
    }
    public function keywords(){
        return $this->hasMany(Keywords::class, 'keyword', 'id');
    }
}
