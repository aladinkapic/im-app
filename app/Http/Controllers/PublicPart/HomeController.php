<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public $_br = 'app.app.';

    public function home(){
        return view($this->_br.'home');
    }
}
