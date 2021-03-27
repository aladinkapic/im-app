@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-euro-sign"></i> @endsection
@section('ph-main') Cijene uređaja @endsection
@section('ph-short')
    Pregledajte sve fizičke uređaje, sa njihovim pripadnostima i karakteristikama - <a href="{{route('system.products.products-prices.insert', ['id' => $product->id])}}">Unesite cijenu</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.products-prices.index', ['id' => $product->id])}}">Cijene uređaja</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $prices])
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
            @foreach($prices as $price)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $price->keywordModuleRel->public_title ?? ''}} </td>
                    <td> {{ $price->keywordRel->title ?? ''}} </td>
                    <td> {{ $price->formattedPrice() ?? ''}} </td>
                    <td> {{ $price->percentage ?? ''}} % </td>
                    <td> {{ $price->formattedWPrice() ?? ''}} </td>
                    <td> {{ $price->percentage_wp ?? ''}} % </td>

                    <td class="text-center">
                        <a href="{{route('system.products.products-prices.edit', ['id' => $price->id ?? ''])}}" title="Uredite cijene fizičkog uređaja">
                            <i class="fas fa-edit text-info"></i>
                        </a>
                        <a href="{{route('system.products.products-prices.delete', ['id' => $price->id ?? ''])}}" title="Obrišite cijenu fizičkog uređaja">
                            <i class="fas fa-trash text-danger ml-2"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
