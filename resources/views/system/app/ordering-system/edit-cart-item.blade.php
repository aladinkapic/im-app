@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shopping-bag"></i> @endsection
@section('ph-main') {{$cart->productRel->title ?? ''}} @endsection
@section('ph-short')
    Definišite cijenu artikla u ovisnosti o potrebi i dogovoru sa kupcem !
@endsection

@section('ph-navigation')
    / <a href="{{route('system.ordering-system.my-orders')}}">{{__('Historija kupovanja')}}</a>
    / <a href="{{route('system.ordering-system.preview-order', ['id' => $order->id])}}">Narudžba broj {{ $order->id }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.ordering-system.update-cart-item', 'action' => 'OrdersController@updateCartItem')) !!}
                {!! Form::hidden('id', $cart->id ?? '', ['class' => 'form-control']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"> Cijena </label>
                            {!! Form::number('price', isset($cart) ? $cart->formattedPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price', 'aria-describedby'=>'priceHelp', 'required' => 'required', 'readonly', 'min' => 0, 'step' => '0.01']) !!}
                            <small id="titleHelp" class="form-text text-muted"> Cijena artikla u trenutku kupovanja </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_price"> Modifikovana cijena </label>
                            {!! Form::number('custom_price', isset($cart) ? $cart->formattedCustomPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'custom_price', 'aria-describedby'=>'custom_priceHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                            <small id="custom_priceHelp" class="form-text text-muted"> Modifikovana cijena uređaja na osnovu dogovora sa klijentom </small>
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
