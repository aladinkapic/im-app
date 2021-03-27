<?php

namespace App\Models\OrderingSystem;

use App\Http\Controllers\System\HelpController;
use App\Models\SystemCore\Settings\KeywordsCustom;
use App\Models\SystemCore\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $guarded = ['id'];

    public function dateCreated(){
        return HelpController::getDate($this->created_at);
    }

    public function orderStatusRel(){
        return $this->hasOne(KeywordsCustom::class, 'keyword_hidden', 'order_status');
    }
    public function userRel(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function shippingPrice(){
        return number_format((float)$this->shipping, 2, '.', '');
    }
}
