@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main') Pregled svih proizvoda @endsection
@section('ph-short') Pregledajte i pretražujte proizvode i njihove karakteristike  @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
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
                    <td> {{ $product->title ?? ''}} </td>
                    <td> {{ $product->categoryRel->title ?? ''}} </td>
                    <td> {{ $product->short_description ?? ''}} </td>
                    <td> {{ $product->formattedPrice() ?? ''}} {{$currency ?? ''}}</td>
                    <td> {{ $product->formattedWPrice() ?? ''}} {{$currency ?? ''}}</td>

                    <td class="text-center">
                        <a href="{{route('system.products.preview-product', ['id' => $product->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
