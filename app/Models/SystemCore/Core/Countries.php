<?php

namespace App\Models\SystemCore\Core;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model{
    protected $table = '__countries';
    protected $guarded = ['id'];
}
