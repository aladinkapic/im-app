<?php

namespace App\Models\SystemCore\Core;

use Illuminate\Database\Eloquent\Model;

class File extends Model{
    protected $table = '__files';
    protected $guarded = ['id'];
}
