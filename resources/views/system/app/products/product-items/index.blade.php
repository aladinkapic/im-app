@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-laptop-code"></i> @endsection
@section('ph-main') Pregled svih uređaja @endsection
@section('ph-short')
    Pregledajte sve fizičke uređaje, sa njihovim pripadnostima i karakteristikama - <a href="{{route('system.products.products-items.add-item', ['id' => $product->id])}}">Unesite uređaj</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.products-items.index', ['id' => $product->id])}}">Pregled uređaja</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $items])
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
            @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $item->item_id ?? ''}} </td>
                    <td> {{ $item->item_password ?? ''}} </td>
                    <td>
                        <ul>
                            @foreach($item->AffiliationRel as $ar)
                                <li>{{$ar->keywordRel->title ?? ''}}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.products.products-items.edit-item', ['item_id' => $item->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
