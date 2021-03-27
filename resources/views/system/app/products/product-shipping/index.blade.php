@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shipping-fast"></i> @endsection
@section('ph-main') Dostava proizvoda @endsection
@section('ph-short')
    Pregled svih opcija isporuke / dostave, u ovisnosti od države u koju se šalje !
    - <a href="{{route('system.products.product-shipping.create', ['id' => $product->id ?? ''])}}"> {{__('Unesite novi')}} </a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.shipping.index')}}"> Dostava </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $shippingMethods])
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
            @foreach($shippingMethods as $ship)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $ship->shippingRel->title ?? ''}} </td>
                    <td>
                        <ul>
                            @foreach($ship->shippingRel->pricesRel as $price)
                                <a href="#" title="">
                                    <li>{{$price->countryRel->title ?? ''}} - {{$price->formattedPrice() ?? ''}} {{$price->currencyRel->title ?? ''}}</li>
                                </a>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.products.product-shipping.edit', ['id' => $ship->id])}}" title="Uredite relaciju između proizvoda i dostave">
                            <i class="fas fa-edit text-info"></i>
                        </a>
                        <a href="{{route('system.products.product-shipping.delete', ['id' => $ship->id])}}" title="Obrišite relaciju između proizvoda i dostave">
                            <i class="fas fa-trash text-danger ml-2"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
