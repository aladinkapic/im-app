<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\SystemCore\Blog\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public $_br = 'app.app.';

    public function home(){
        $posts = Blog::whereHas('categoryRel', function ($q){
            $q->where('deleted', 0);
        })->where('published', 1)->orderBy('views', 'DESC')->take(3)->get();;

        // $posts = Blog::where('published', 1)->orderBy('views', 'DESC')->take(3)->get();

        return view($this->_br.'home', [
            'posts' => $posts
        ]);
    }
    public function contactUs(){
        return view($this->_br.'contact-us.contact-us');
    }
}
