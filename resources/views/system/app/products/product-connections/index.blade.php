@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Pregled svih povezanosti @endsection
@section('ph-short')
    Pregledajte sve povezanosti šifarnika (kategorija) sa proizvodima
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
{{--        @include('system.template.snippets.filters', ['var' => $items])--}}
        <table class="table table-bordered" id="">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;" width="80px">#</th>
                <th scope="col">Šifarnik</th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($affiliations as $a)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $a->keywordRel->title ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.products.products-items.edit-item', ['item_id' => $a->id ?? ''])}}" title="Pregled instanci šifarnika">
                            <button class="btn-danger btn-xs">Obrišite</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
