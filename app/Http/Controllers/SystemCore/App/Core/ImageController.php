<?php

namespace App\Http\Controllers\SystemCore\App\Core;

use App\Http\Controllers\Controller;
use App\Models\SystemCore\Core\File;
use Illuminate\Http\Request;

class ImageController extends Controller{
    public static function insertImage(Request $request){
        if($request->has('photo-input')){
            try{
                $file = $request->file('photo-input');
                $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                $file->move($request->path, $name);

                $file_ = File::create([
                    'category' => $request->category,
                    'file' => $name,
                    'path' => $request->path,
                    'extension' => $ext
                ]);

                return $file_->id;
            }catch (\Exception $e){dd($e);}
        }else return null;
    }
    public static function destroyImage($id){
        try{
            $file = File::where('id', $id)->first();
            unlink($file->path.$file->file);
        }catch (\Exception $e){}
    }
    public function uploadFile(Request $request){
        try{
            $image_id = $this::insertImage($request);
            $file = File::where('id', $image_id)->first();

            return json_encode(array('code' => '0000', 'image_id' => $image_id, 'photo' => $file->file));
        }catch (\Exception $e){
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }
    }
}
