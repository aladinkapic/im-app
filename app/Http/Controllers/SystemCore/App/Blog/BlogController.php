<?php

namespace App\Http\Controllers\SystemCore\App\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemCore\App\Core\ImageController;
use App\Models\SystemCore\Blog\BCDoubleImages;
use App\Models\SystemCore\Blog\BCHeaders;
use App\Models\SystemCore\Blog\BCParagraph;
use App\Models\SystemCore\Blog\BCSlider;
use App\Models\SystemCore\Blog\Blog;
use App\Models\SystemCore\Blog\BlogContent;
use App\Models\SystemCore\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller{
    protected $br = 'system.app.blog.';
    public function getCategories(){ return BlogCategoriesController::getCategories(); }

    public function index(){
        $posts = Blog::where('id', '>',  0)->get();
//        $posts = Filters::filter($posts);

//        $filters = [
//            'title' => 'Naslov',
//            'categoryRel.title' => 'Kategorija',
//            'short_description' => 'Kratki opis',
//        ];

        return view($this->br.'.index', [
            'posts' =>$posts
        ]);
    }
    public function getData($action, $id = null){
        return [
            $action => true,
            'categories' => $this->getCategories(),
            'source' => 'images/blog/',
            'post' => Blog::where('id', $id)->first(),
            'content' => BlogContent::where('post_id', $id)->orderBy('id')->get()
        ];
    }
    public function createPost(){
        return view($this->br.'.create', [
            'categories' => $this->getCategories(),
            'source' => 'images/blog/',
            'create' => true
        ]);
    }
    public function saveBlogImage(Request $request){
        try{
            $image_id = ImageController::insertImage($request);
            $file = File::where('id', $image_id)->first();

            return json_encode(array('code' => '0000', 'image_id' => $image_id, 'photo' => $file->file));
        }catch (\Exception $e){
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }
    }
    public function savePost(Request $request){
        try{
            $request->request->add(['created_by' => Auth::id()]);
            $blogPost = Blog::create(
                $request->except(['_token', 'photo_input'])
            );
        }catch (\Exception $e){}
        return redirect()->route('system.blog.index');
    }
    public function previewPost($id){
        return view($this->br.'create',
            $this->getData('preview', $id)
        );
    }
    public function editPost($id){
        return view($this->br.'create',
            $this->getData('edit', $id)
        );
    }
    public function updatePost(Request $request){
        try{
            $post = Blog::where('id', $request->id)->update(
                $request->except(['_token', 'id', 'photo-input'])
            );
        }catch (\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $request->id]);
    }
    //Delete post
    public function deletePost($id){
        $post_id = BlogContent::where('post_id', $id)->orderBy('id')->get();
        foreach ($post_id as $cont){
            if ($cont->category == 'header'){
                $hdrs = BCHeaders::where('content_id', $cont->id)->delete();
            }
            elseif ($cont->category == 'paragraph'){
                $pars = BCParagraph::where('content_id', $cont->id)->delete();
            }
            elseif ($cont->category == 'dobule_images'){
                $dblimg = BCDoubleImages::where('content_id', $cont->id)->first();
                ImageController::destroyImage($dblimg->image_left);
                ImageController::destroyImage($dblimg->image_right);

                $dblimg->delete();
            }
            elseif ($cont->category == 'slider'){
                $images = BCSlider::where('content_id', $cont->id)->get();
                foreach ($images as $image){
                    $this->justDeleteImage($image->id);
                    $image->delete();
                }
            }
        }
        $post_id_delete = BlogContent::where('post_id', $id)->delete();
        $post_delete = Blog::where('id', $id)->delete();
        return redirect()->route('system.blog.index');
    }

    // -------------------------------------------------------------------------------------------------------------- //
    // ** Blog headers ** //
    public function createHeader($id){
        return view($this->br.'includes.create-header',[
            'post' => Blog::where('id', $id)->first()
        ]);
    }
    public function saveHeader(Request  $request){
        try{
            $connection = BlogContent::create([
                'category' => 'header',
                'post_id' => $request->post_id
            ]);

            $header = BCHeaders::create([
                'content_id' => $connection->id,
                'title' => $request->title
            ]);
        }catch (\Exception $e){}

        return redirect()->route('system.blog.preview-post', ['id' => $request->post_id]);
    }
    public function editHeader($id){
        try{
            $header = BCHeaders::where('id', $id)->first();
            return view($this->br.'includes.create-header',[
                'header' => $header,
                'post' => Blog::where('id', $header->contentRel->postRel->id)->first(),
                'edit' => true
            ]);
        }catch(\Exception $e){}
    }
    public function updateHeader(Request $request){
        try{
            $bh = BCHeaders::where('id', $request->id)->first(); // ** Get an object ** //
            // ** Update title ** //
            $bh->update([
                'title' => $request->title
            ]);
            // Now, we need post_id for returning to post preview
            return isset($bh->contentRel->postrel->id) ? redirect()->route('system.blog.preview-post', ['id' => $bh->contentRel->postrel->id]) : redirect()->route('system.blog.edit-header', ['id' => $request->id]);
        }catch (\Exception $e){}
    }
    public function deleteHeader($id){
        try{
            $connection = BlogContent::where('post_id', $id)->where('category', 'header')->first();
            $hdrs = BCHeaders::where('content_id', $connection->id)->delete();
            $cont = BlogContent::where('id', $connection->id)->delete();

        }catch(\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $id]);
    }

    // -------------------------------------------------------------------------------------------------------------- //
    // ** Blog paragraphs ** //
    public function createParagraph($id){
        return view($this->br.'includes.create-paragraph',[
            'post' => Blog::where('id', $id)->first()
        ]);
    }
    public function saveParagraph(Request $request){
        try{
            $connection = BlogContent::create([
                'category' => 'paragraph',
                'post_id' => $request->post_id
            ]);
            $paragraph = BCParagraph::create([
                'content_id' => $connection->id,
                'paragraph' => $request->paragraph
            ]);
        }catch (\Exception $e){}

        return redirect()->route('system.blog.preview-post', ['id' => $request->post_id]);
    }
    public function editParagraph($id){
        try{
            $paragraph = BCParagraph::where('id', $id)->first();
            return view($this->br.'includes.create-paragraph',[
                'paragraph' => $paragraph,
                'post' => Blog::where('id', $paragraph->contentRel->postRel->id)->first(),
                'edit' => true
            ]);
        }catch(\Exception $e){}
    }
    public function updateParagraph(Request $request){
        try {
            $bh = BCParagraph::where('id', $request->id)->first(); // ** Get an object ** //
            // ** Update paragraph ** //
            $bh->update([
                'paragraph' => $request->paragraph
            ]);

            // Now, we need post_id for returning to post preview
            return isset($bh->contentRel->postrel->id) ? redirect()->route('system.blog.preview-post', ['id' => $bh->contentRel->postrel->id]) : redirect()->route('system.blog.edit-paragraph', ['id' => $request->id]);
        }catch (\Exception $e){}
    }
    public function deleteParagraph($id){
        try{
            $connection = BlogContent::where('post_id', $id)->where('category', 'paragraph')->first();
            $hdrs = BCParagraph::where('content_id', $connection->id)->delete();
            $cont = BlogContent::where('id', $connection->id)->delete();

        }catch(\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $id]);
    }

    // -------------------------------------------------------------------------------------------------------------- //
    // ** Blog Double Images ** //
    public function createDoubleImages($id){
        return view($this->br.'includes.create-doubleImages',[
            'post' => Blog::where('id', $id)->first(),

            'source' => 'images/blog/'
        ]);
    }
    public function saveDoubleImages(Request $request){
        try{
            $connection = BlogContent::create([
                'category' => 'dobule_images',
                'post_id' => $request->post_id
            ]);
            $images = BCDoubleImages::create([
                'content_id' => $connection->id,
                'image_left' => $request->image_left,
                'image_right' => $request->image_right
            ]);
        }catch (\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $request->post_id]);
    }
    public function saveImageLeft(Request $request){
        try {
            $request->request->add(['category' => 'blog-front-image']);
            $image_id = ImageController::insertImage($request);

            $file = File::where('id', $image_id)->first();
            return json_encode(array('code' => '0000', 'left_image_id' => $image_id, 'photo' => $file->file));
        } catch (\Exception $e) {
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }
    }
    public function saveImageRight(Request $request){
        try{
            $request->request->add(['category' => 'blog-front-image']);
            $image_id = ImageController::insertImage($request);

            $file = File::where('id', $image_id)->first();
            return json_encode(array('code' => '0000', 'right_image_id' => $image_id, 'photo' => $file->file));
        }catch (\Exception $e){
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }

    }
    public function deleteDoubleImages($id){

        try{
            $images = BCDoubleImages::where('id', $id)->first();
            $content = BlogContent::where('id', $images->content_id)->first();

            // ** Get post ID for redirecting ** //
            $post_id = $content->post_id;

            // ** Destroy image files ** //
            ImageController::destroyImage($images->image_left);
            ImageController::destroyImage($images->image_right);

            $images->delete();
            $content->delete();
        }catch(\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $post_id]);
    }
    public function editDoubleImages($id){
        try{
            $images = BCDoubleImages::where('id', $id)->first();
            return view($this->br.'includes.create-doubleImages',[
                'dobule_images' => $images,
                'edit' => true,
                'post' => Blog::where('id', $images->contentRel->postRel->id)->first(),
                'source' => 'images/blog/'
            ]);
        }catch(\Exception $e){}
    }
    public function updateDoubleImages(Request $request){
        try {
            $bh = BCDoubleImages::where('id', $request->id)->first(); // ** Get an object ** //

            // ** Update images ** //
            $bh->update([
                'image_left' => $request->image_left,
                'image_right' => $request->image_right
            ]);

            // Now, we need post_id for returning to post preview
            return isset($bh->contentRel->postrel->id) ? redirect()->route('system.blog.preview-post', ['id' => $bh->contentRel->postrel->id]) : redirect()->route('system.blog.edit-paragraph', ['id' => $request->id]);
        }catch (\Exception $e){}
    }

    // -------------------------------------------------------------------------------------------------------------- //
    // ** Blog slider ** //
    public function createSlider($id){
        return view($this->br.'includes.create-slider',[
            'post' => Blog::where('id', $id)->first(),
            'source' => 'images/blog/',
            'category' => 'blog-slider-image'
        ]);
    }
    public function saveImage(Request $request){
        try{
            $image_id = ImageController::insertImage($request);
            $file = File::where('id', $image_id)->first();

            $connection = BlogContent::create([
                'category' => 'slider',
                'post_id' => $request->post_id
            ]);
            $images = BCSlider::create([
                'content_id' => $connection->id,
                'image_id' => $file->id
            ]);

        }catch (\Exception $e){}
        return redirect()->route('system.blog.slider.edit-slider', ['content' => $connection->id ]);
    }
    public function editSlider($content){
        $content = BlogContent::where('id', $content)->first();
        $slides  = BCSlider::where('content_id', $content->id)->get();

        return view($this->br.'includes.create-slider',[
            'post' => Blog::where('id', $content->post_id)->first(),
            'source' => 'images/blog/',
            'category' => 'blog-slider-image',
            'files' => $slides,
            'content' => $content,
            'edit' => true
        ]);
    }
    public function updateImage (Request $request){
        try{
            $image_id = ImageController::insertImage($request);
            $file = File::where('id', $image_id)->first();

            $images = BCSlider::create([
                'content_id' => $request->content_id,
                'image_id' => $file->id
            ]);
        }catch (\Exception $e){}
        return redirect()->route('system.blog.slider.edit-slider', ['content' => $request->content_id ]);
    }
    public function justDeleteImage($id){
        try{
            $image = BCSlider::where('id', $id)->first();
            $content_id = $image->content_id;

            ImageController::destroyImage($image->image_id);
            $image->delete();
        }catch (\Exception $e){ return false; }
        return $content_id;
    }
    public function deleteSliderImage ($id){
        $content_id = $this->justDeleteImage($id);
        return redirect()->route('system.blog.slider.edit-slider', ['content' => $content_id ]);
    }
    public function deleteSlider($content){
        try{
            $content = BlogContent::where('id', $content)->first();
            $images = BCSlider::where('content_id', $content->id)->get();
            foreach ($images as $image){
                $this->justDeleteImage($image->id);
            }
            $post_id = $content->post_id;
            $content->delete();
            $images->delete();
        }catch (\Exception $e){}
        return redirect()->route('system.blog.preview-post', ['id' => $post_id]);
    }
}
