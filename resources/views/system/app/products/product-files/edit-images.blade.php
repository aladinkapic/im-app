@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main') Uredite fotografije proizvoda @endsection
@section('ph-short') Uredite dvije osnovne fotografije proizvoda, pregled na naslovnoj i pregled na artiklima  @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id ?? ''])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.files.edit-images', ['id' => $product->id ?? ''])}}">Uredite fotografije</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-6">
                <div class="product-photo">
                    <img src="{{asset($source.(isset($product->homeImgRel->file) ? $product->homeImgRel->file : ''))}}" id="home-photo" alt="">
                    <form action="">
                        <label for="home-photo-input">
                            <div class="input-image-shadow t-3">
                                <h1>350 x 310</h1>
                            </div>
                        </label>
                        <input type="file" id="home-photo-input" class="photo-input" path="{{$source}}" object-id="{{$product->id ?? ''}}" photo-name="home-photo" name="photo-input" url="{{route('system.products.files.update-home-image')}}">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-photo">
                    <img src="{{asset($source.(isset($product->mainImgRel->file) ? $product->mainImgRel->file : ''))}}" id="main-photo" alt="">
                    <form action="">
                        <label for="main-photo-input">
                            <div class="input-image-shadow t-3">
                                <h1>430 x 560</h1>
                            </div>
                        </label>
                        <input type="file" id="main-photo-input" class="photo-input" path="{{$source}}" object-id="{{$product->id ?? ''}}" photo-name="main-photo" name="photo-input" url="{{route('system.products.files.update-main-image')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
