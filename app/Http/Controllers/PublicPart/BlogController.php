<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemCore\App\Core\Filters;
use App\Models\SystemCore\Blog\Blog;
use App\Models\SystemCore\Blog\BlogCategories;
use App\Models\SystemCore\Blog\BlogContent;
use Illuminate\Http\Request;

class BlogController extends Controller{
    public function getData($category = null){
        $posts = Blog::whereHas('categoryRel', function ($q){
            $q->where('deleted', 0);
        })->where('published', 1);

        isset($category) ? $posts->where('category', $category) : $posts->orderBy('id', 'DESC');

        $popular = Blog::where('published', 1)->orderBy('views', 'DESC')->take(3)->get();
        $posts = Filters::filter($posts, 3);

        $noPages  = (($posts->total() / 3) === (int)($posts->total() / 3)) ? ($posts->total() / 3) : ((int)($posts->total() / 3) + 1);
        $nextPage = isset($_GET['page']) ? ($_GET['page'] + 1) : 2;
        $nextPage = ($nextPage > $noPages) ? $nextPage = $noPages : $nextPage;
        $current  = isset($_GET['page']) ? $_GET['page'] : 1;

        $headerImage = (isset($category)) ? BlogCategories::where('id', $category)->first() : BlogCategories::where('deleted', 0)->inRandomOrder()->first();


        return view('/app/app/blog/blog', [
            'posts' => $posts,
            'categories' => BlogCategories::where('deleted', 0)->get(),
            'popular' => $popular,
            'noPages'  => $noPages,
            'nextPage' => $nextPage,
            'current' => $current,
            'category' => $category,
            'headerImage' => $headerImage
        ]);
    }
    public function index(){
        return $this->getData();
    }
    public function indexWithCategories($category){
        return $this->getData($category);
    }

    public function preview ($id){
        $post = Blog::where('id', $id)->first();
        $popular = Blog::where('published', 1)->orderBy('views', 'DESC')->take(3)->get();

        return view('/app/app/blog/blog-post', [
            'content' => BlogContent::where('post_id', $id)->orderBy('id')->get(),
            'categories' => BlogCategories::where('deleted', 0)->get(),
            'category' => BlogCategories::where('id', $post->category)->first(),
            'post' => $post,
            'popular' => $popular
        ]);
    }
}
