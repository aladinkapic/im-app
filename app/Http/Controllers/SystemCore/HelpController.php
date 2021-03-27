<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HelpController extends Controller{
    protected $_months = ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'];

    public static function getDate($created_at){
        return Carbon::parse($created_at)->format('d. ').((new self())->_months[(Carbon::parse($created_at)->format('m') + 1)]).Carbon::parse($created_at)->format(' Y - H:i').'h';
    }
    public static function boldString($string){
        return '<strong>'.$string.'</strong>';
    }
}
