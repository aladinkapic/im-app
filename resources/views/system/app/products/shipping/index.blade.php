@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shipping-fast"></i> @endsection
@section('ph-main') Dostava proizvoda @endsection
@section('ph-short')
    Pregled svih opcija isporuke / dostave, u ovisnosti od države u koju se šalje !
    - <a href="{{route('system.products.shipping.create')}}"> {{__('Unesite novi')}} </a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.shipping.index')}}"> Dostava </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $shipping])
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
            @foreach($shipping as $ship)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $ship->title ?? ''}} </td>
                    <td>
                        <ul>
                            @foreach($ship->pricesRel as $price)
                                <a href="{{route('system.products.shipping.prices.edit', ['id' => $price->id ?? ''])}}" title="Uredite cijenu dostave">
                                    <li>
                                        {{$price->countryRel->name ?? ''}} - {{$price->formattedPrice() ?? ''}} {{$price->currencyRel->title ?? ''}}
                                        ( {{ $price->weight_from ?? ''}}g - {{ $price->weight_to ?? ''}} g )
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.products.shipping.preview', ['id' => $ship->id])}}" title="Pregled detaljno informacije o isporuci">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
