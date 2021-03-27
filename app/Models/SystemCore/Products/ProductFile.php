<?php

namespace App\Models\SystemCore\Products;

use App\Models\SystemCore\Core\File;
use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model{
    protected $table = 'products__files';
    protected $guarded = ['id'];

    public function fileRel(){
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
