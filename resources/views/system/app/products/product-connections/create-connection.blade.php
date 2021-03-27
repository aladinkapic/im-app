@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Kreirajte povezanost @endsection
@section('ph-short') Kreirajte povezanost između proizvoda i njegovih karakteristika - odaberite željene karakteristike  @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.products-connections.add-affiliation', ['id' => $product->id])}}">Kreirajte povezanost</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3 product-wrapper" product-id="{{isset($product) ? $product->id : 'empty'}}" product-title="{{isset($product) ? $product->title : ''}}">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    <!-- TODO - add edit -->
                @else
                    {!! Form::open(array('route' => 'system.products.products-connections.save-affiliation', 'action' => 'ProductPropertyController@saveConnection')) !!}
                @endif

                    {!! Form::hidden('product_id', $product->id ?? '0', ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keyword">Naziv proizvoda</label>
                                {!! Form::select('keyword', $keywords, '', ['class' => 'form-control select-2', 'id' => 'keyword', 'aria-describedby'=>'keywordHelp', 'required' => 'required']) !!}
                                <small id="keywordHelp" class="form-text text-muted">Odaberite šifarnik</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Sačuvajte uzorak</button>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>



@endsection
