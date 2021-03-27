@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main') @if(isset($create)) Unos proizvoda @else {{$product->title}} @endif @endsection
@section('ph-short') Unesite / pregledajte osnovne informacije o proizvodu  @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    @if(isset($create))
        / <a href="{{route('system.products.create-product')}}">Unos proizvoda</a>
    @else
        / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}">{{$product->title ?? ''}}</a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    @include('system.app.products.includes.create')
@endsection
