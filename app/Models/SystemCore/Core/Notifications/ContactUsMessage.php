<?php

namespace App\Models\SystemCore\Core\Notifications;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model{
    protected $table = 'notifications__contact_us';
    protected $guarded = ['id'];
}
