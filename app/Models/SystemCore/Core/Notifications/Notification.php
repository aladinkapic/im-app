<?php

namespace App\Models\SystemCore\Core\Notifications;

use App\Http\Controllers\System\HelpController;
use App\Models\SystemCore\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model{
    protected $table = 'notifications';
    protected $guarded = ['id'];

    public function getTime(){
        return HelpController::getDate($this->created_at);
    }
    public function userRel(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
