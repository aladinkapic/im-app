@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shipping-fast"></i> @endsection
@section('ph-main') Unos cijena @endsection
@section('ph-short')
    @if(isset($create))
        Unesite cijenu u odnosu na državu - Svaka država se drukčije naplaćuje
    @else

    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.shipping.index')}}"> Dostava </a>
    / <a href="{{route('system.products.shipping.preview', ['id' => $shipping->id ?? ''])}}"> {{$shipping->title ?? ''}} </a>
    @if(isset($create))
        / <a href="{{route('system.products.shipping.prices.insert', ['shipping_id' => $shipping->id ?? '0']) }}"> Unos </a>
    @else

    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')

    <div class="content-wrapper p-3" >

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.products.shipping.prices.update', 'action' => 'ShippingController@updatePrice')) !!}
                    {!! Form::hidden('id', $price->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.products.shipping.prices.save', 'action' => 'ShippingController@savePrice')) !!}
                @endif

                    {!! Form::hidden('shipping_id', $shipping->id ?? '', ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country"> Država </label>
                                {!! Form::select('country', $countries, $price->country ?? '', ['class' => isset($edit) ? 'form-control' : 'form-control select-2', 'id' => 'country', 'aria-describedby'=>'countryHelp', 'required' => 'required', isset($edit) ? 'disabled => true' : '']) !!}
                                <small id="countryHelp" class="form-text text-muted"> Država u koju se isporučuje </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"> Cijena dostave </label>
                                {!! Form::number('price', isset($price) ? $price->formattedPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price', 'aria-describedby'=>'priceHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                                <small id="priceHelp" class="form-text text-muted"> Cijena dostave za odabranu državu </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="currency"> Valuta </label>
                                {!! Form::select('currency', $currency, $price->currency ?? '', ['class' => isset($edit) ? 'form-control' : 'form-control select-2', 'id' => 'currency', 'aria-describedby'=>'currencyHelp', 'required' => 'required', isset($edit) ? 'disabled => true' : '']) !!}
                                <small id="currencyHelp" class="form-text text-muted"> Osnovna valuta <!-- TODO :: Vjerovatno će uvijek biti BAM --> </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weight_from"> Težina od (g) </label>
                                {!! Form::text('weight_from', $price->weight_from ?? '', ['class' => 'form-control', 'id' => 'weight_from', 'aria-describedby'=>'weight_fromHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="weight_fromHelp" class="form-text text-muted"> Opseg težine paketa </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weight_to"> Težina do (g) </label>
                                {!! Form::text('weight_to', $price->weight_to ?? '', ['class' => 'form-control', 'id' => 'weight_to', 'aria-describedby'=>'weight_toHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="weight_toHelp" class="form-text text-muted"> Opseg težine paketa </small>
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
