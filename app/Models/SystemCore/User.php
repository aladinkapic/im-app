<?php

namespace App\Models\SystemCore;

use App\Models\SystemCore\Core\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'users';
    protected $guarded = ['id'];

    public function notificationsRel(){
        return $this->hasMany(Notification::class, 'owner_id', 'id')->orderBy('id', 'DESC')->take(10);
    }
}
