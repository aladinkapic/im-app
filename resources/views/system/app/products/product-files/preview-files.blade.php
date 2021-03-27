@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main') Unesite fotografiju proizvoda @endsection
@section('ph-short') Unesite fotografiju proizvoda - kreirajte galeriju @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id ?? ''])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.files.gallery.insert-image', ['id' => $product->id ?? ''])}}">Unesite fotografiju</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3 product-wrapper">

    {!! Form::open(array('route' => 'system.products.files.save-file', 'action' => 'ProductFiles@saveFile', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

    <!-- Hidden variables -- Product ID & path -->
        {!! Form::hidden('product_id', $product->id ?? '', ['class' => 'form-control']) !!}
        {!! Form::hidden('path', $path ?? '', ['class' => 'form-control']) !!}


        <div class="row">
            <div class="col-md-5">
                <div class="product-gallery-images">
                    <label for="gallery-image" class="form-image-label" style="display:block; ">
                        <div id="upload-files-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>{{__('IZABERITE DATOTEKU')}}</p>
                            <p>{{__('560 x 560')}}</p>
                        </div>
                    </label>

                    <input type="file" id="gallery-image" name="photo-input" class="gallery-image" required>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label for="file_title">Naziv dokumenta</label>
                            {!! Form::text('file_title', '', ['class' => 'form-control', 'id' => 'file_title', 'aria-describedby' => 'file_titleHelp', 'required' => 'required']) !!}
                            <small id="file_titleHelp" class="form-text text-muted"> Naziv dokumenta - Služi za prikazivanje dokumenta javnosti </small>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label for="file_title_en">Naziv dokumenta - EN</label>
                            {!! Form::text('file_title_en', '', ['class' => 'form-control', 'id' => 'file_title_en', 'aria-describedby' => 'file_title_enHelp', 'required' => 'required']) !!}
                            <small id="file_title_enHelp" class="form-text text-muted"> Naziv dokumenta (EN) - Služi za prikazivanje dokumenta javnosti </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-sm btn-dark">Sačuvajte fotografiju</button>
            </div>
        </div>

        {!! Form::close(); !!}
    </div>

    @if(count($files))
        <div class="content-wrapper p-3 product-wrapper mt-3">
            @foreach($files as $file)
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="preview-file-w p-3">
                            <div class="icon-wrapper">
                                @if($file->fileRel->extension == 'docx')
                                    <i class="far fa-file-word"></i>
                                @elseif($file->fileRel->extension == 'pdf')
                                    <i class="far fa-file-pdf"></i>
                                @elseif($file->fileRel->extension == 'xlsx')
                                    <i class="far fa-file-excel"></i>
                                @else
                                    <i class="far fa-file"></i>
                                @endif
                            </div>
                            <div class="text-wrapper">
                                <h4>{{$file->file_title ?? ''}}</h4>
                                <p>
                                    {{$file->fileRel->file ?? ''}}
                                </p>
                                <div class="delete-file t-3" title="{{__('Obrišite dokument')}}">
                                    <a href="{{route('system.products.files.gallery.delete-file', ['id' => $file->id ?? ''])}}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
