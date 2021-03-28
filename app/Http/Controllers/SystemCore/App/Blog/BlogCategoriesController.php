<?php

namespace App\Http\Controllers\SystemCore\App\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemCore\App\Core\Filters;
use App\Http\Controllers\SystemCore\App\Core\ImageController;
use App\Models\SystemCore\Blog\BlogCategories;
use App\Models\SystemCore\Core\File;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller{
    protected $_br = 'system.app.blog.categories.';
    protected $_source = 'images/blog/categories/';

    public function index (){
        $categories = BlogCategories::where('deleted', 0);
        $categories = Filters::filter($categories);

        $filters = [
            'title' => 'Naslov',
            'title_en' => 'Naslov (EN)',
        ];

        return view($this->_br.'index', [
            'categories' =>$categories,
            'filters' => $filters
        ]);
    }

    public function saveImage(Request $request){
        try{
            $image_id = ImageController::insertImage($request);
            $file = File::where('id', $image_id)->first();

            return json_encode(array('code' => '0000', 'image_id' => $image_id, 'photo' => $file->file));
        }catch (\Exception $e){
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }
    }

    public function create (){
        return view($this->_br.'create', [
            'source' => $this->_source,
        ]);
    }
    public function save(Request $request){
        try{
            $category = BlogCategories::create(
                $request->except(['_token', 'photo-input'])
            );
        }catch (\Exception $e){}
        return redirect()->route('system.blog.categories.edit', ['id' => $category->id]);
    }
    public function edit($id){
        return view($this->_br.'create', [
            'source' => $this->_source,
            'category' => BlogCategories::where('id', $id)->first(),
            'edit' => true
        ]);
    }
    public function update(Request $request){
        try{
            $category = BlogCategories::where('id', $request->id)->update(
                $request->except(['id', '_token', 'photo-input'])
            );
        }catch (\Exception $e){}
        return redirect()->route('system.blog.categories.edit', ['id' => $request->id]);
    }
    public function delete ($id){
        try{
            BlogCategories::where('id', $id)->update(['deleted' => 1]);
        }catch (\Exception $e){}
        return redirect()->route('system.blog.categories.index');
    }

    // -------------------------------------------------------------------------------------------------------------- //

    public static function getCategories(){ return BlogCategories::where('deleted', 0)->pluck('title', 'id')->prepend('Odaberite kategoriju', ''); }
}
