@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main')
    @if(isset($edit))
        {{ $product->productRel->title ?? '' }}
    @else
        Unesite fotografiju proizvoda
    @endif
@endsection
@section('ph-short')
    Unesite fotografiju proizvoda - kreirajte galeriju
    @if(isset($edit))
        | <a href="{{route('system.homepage.main-product.delete', ['id' => $product->id])}}">Obrišite</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.homepage.main-product.index')}}">Osnovni proizvodi</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3 product-wrapper">
        @if(isset($edit))
            {!! Form::open(array('route' => 'system.homepage.main-product.update', 'action' => 'MainProductController@update')) !!}
            {!! Form::hidden('id', $product->id, ['class' => 'form-control']) !!}
        @else
            {!! Form::open(array('route' => 'system.homepage.main-product.save', 'action' => 'MainProductController@save')) !!}
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="product-photo">
                    <!-- Hidden element for file id -->
                    {!! Form::hidden('image_id', $product->image_id ?? '', ['class' => 'form-control', 'id' => 'first-photo-input']) !!}
                    <img src="{{isset($product) ? $product->imageObject() : ''}}" id="first-photo" alt="">
                    <label for="photo-return-id-first">
                        <div class="input-image-shadow t-3">
                            <h1>900 x 600</h1>
                        </div>
                    </label>
                    <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source ?? ''}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('api.system.file-system.upload-file')}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label for="product_id"> Odaberite proizvod </label>
                            {!! Form::select('product_id', $products, $product->product_id ?? '', ['class' => 'form-control select-2', 'id' => 'product_id', 'aria-describedby' => 'product_idHelp', 'required' => 'required']) !!}
                            <small id="product_id" class="form-text text-muted"> Odaberite proizvod koji želite vezati za fotografiju </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_title"> Naslov </label>
                            {!! Form::text('custom_title', $product->custom_title ?? '', ['class' => 'form-control', 'id' => 'custom_title', 'aria-describedby' => 'custom_titleHelp', 'required' => 'required']) !!}
                            <small id="custom_titleHelp" class="form-text text-muted"> Specijalni naslov za prikazivanje </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_title_en"> Naslov (EN)</label>
                            {!! Form::text('custom_title_en', $product->custom_title_en ?? '', ['class' => 'form-control ', 'id' => 'custom_title_en', 'aria-describedby' => 'custom_title_enHelp', 'required' => 'required']) !!}
                            <small id="custom_title_enHelp" class="form-text text-muted"> Specijalni naslov za prikazivanje </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_desc"> Detaljni opis </label>
                            {!! Form::textarea('custom_desc', $product->custom_desc ?? '', ['class' => 'form-control fc-t-120', 'id' => 'custom_desc', 'aria-describedby' => 'custom_desceHelp', 'required' => 'required']) !!}
                            <small id="custom_desceHelp" class="form-text text-muted"> Detaljni opis za prikazivanje </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_desc_en"> Detaljni opis (EN)</label>
                            {!! Form::textarea('custom_desc_en', $product->custom_desc_en ?? '', ['class' => 'form-control fc-t-120', 'id' => 'custom_desc_en', 'aria-describedby' => 'custom_desc_enHelp', 'required' => 'required']) !!}
                            <small id="custom_desc_enHelp" class="form-text text-muted"> Detaljni opis za prikazivanje </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-sm btn-dark">Ažurirajte informacije</button>
            </div>
        </div>

        {!! Form::close(); !!}
    </div>

@endsection
