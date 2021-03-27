@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fab fa-product-hunt"></i> @endsection
@section('ph-main') Osnovni proizvodi @endsection
@section('ph-short')
    Pregledajte i pretražujte osnovne proizvode prikazane na naslovnoj strani
    | <a href="{{route('system.homepage.main-product.create')}}">Unesite novi</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.homepage.main-product.index')}}">Osnovni proizvodi</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $products])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.template.snippets.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($products as $product)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $product->productRel->title ?? ''}} </td>
                    <td> {{ $product->productRel->categoryRel->title ?? ''}} </td>
                    <td> {{ $product->productRel->short_description ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.homepage.main-product.edit', ['id' => $product->id])}}" title="Uredite listu osnovnih proizvoda">
                            <button class="btn-dark btn-xs">Uredite</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
