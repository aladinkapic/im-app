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

        {!! Form::open(array('route' => 'system.products.files.gallery.save-image', 'action' => 'ProductFiles@saveImage', 'files' => true, 'enctype'=>'multipart/form-data')) !!}

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
                                <label for="color_id">Boja artikla</label>
                                {!! Form::select('color_id', $keywords, '', ['class' => 'form-control select-2', 'id' => 'color_id', 'aria-describedby' => 'color_idHelp', 'required' => 'required']) !!}
                                <small id="color_idHelp" class="form-text text-muted"> Boja proizvoda -- radi interaktivnijeg pregleda artikla </small>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="description">Opis fotografije</label>
                                {!! Form::textarea('description', '', ['class' => 'form-control fc-t-120', 'id' => 'description', 'aria-describedby' => 'descriptionHelp', 'required' => 'required']) !!}
                                <small id="descriptionHelp" class="form-text text-muted"> Detaljne informacije o fotografiji (veličina proizvoda, boja, sadržaj i slično) </small>
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
@endsection
