@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shipping-fast"></i> @endsection
@section('ph-main') Unos @endsection
@section('ph-short')
    Unesite novu opciju dostave produkata
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.shipping.index')}}"> Dostava </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3" >
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.products.product-shipping.update', 'action' => 'ProductShippingController@update')) !!}
                    {!! Form::hidden('id', $ps->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.products.product-shipping.save', 'action' => 'ProductShippingController@save')) !!}
                @endif

                    {!! Form::hidden('product_id', $product->id, ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shipping_id"> Vrsta isporuke / dostave </label>
                                {!! Form::select('shipping_id', $shipping, $ps->shipping_id ?? '', ['class' => 'form-control select-2', 'id' => 'shipping_id', 'aria-describedby'=>'shipping_idHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="shipping_idHelp" class="form-text text-muted"> Odaberit vrstu / način isporuke / dostave proizvoda </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
