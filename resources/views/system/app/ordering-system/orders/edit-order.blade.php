@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-file-alt"></i> @endsection
@section('ph-main') Narudžba broj {{$order->id}} @endsection
@section('ph-short')
    Uredite status narudžbe, kao i dodatne informacije u ovisnosti o dogovoru sa kupcem.
@endsection

@section('ph-navigation')
    / <a href="{{route('system.ordering-system.my-orders')}}">{{__('Historija kupovanja')}}</a>
    / <a href="{{route('system.ordering-system.preview-order', ['id' => $order->id])}}">{{ $order->id }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.ordering-system.update-order', 'action' => 'OrdersController@updateOrder')) !!}
                {!! Form::hidden('id', $order->id ?? '', ['class' => 'form-control']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pdv"> PDV (17%) </label>
                            {!! Form::select('pdv', ['Yes' => 'Da', 'No' => 'Ne'], $order->pdv, ['class' => 'form-control', 'id' => 'pdv', 'aria-describedby'=>'pdvHelp', 'required' => 'required']) !!}
                            <small id="pdvHelp" class="form-text text-muted"> Da li korisnik plaća PDV? </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shipping"> Cijena dostave </label>
                            {!! Form::number('shipping', isset($order) ? $order->shippingPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'shipping', 'aria-describedby'=>'shippingHelp', 'required' => 'required', 'min' => 0, 'step' => '0.01']) !!}
                            <small id="shippingHelp" class="form-text text-muted"> Cijena dostave narudžbe </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paying_method"> Način plaćanja </label>
                            {!! Form::select('paying_method', $payingMethods, $order->paying_method ?? '', ['class' => 'form-control', 'id' => 'paying_method', 'aria-describedby'=>'paying_methodHelp', 'required' => 'required', 'disabled' => true]) !!}
                            <small id="paying_methodHelp" class="form-text text-muted"> Odabrani način plaćanja </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order_status"> Status narudžbe </label>
                            {!! Form::select('order_status', $orderStatus, $order->order_status ?? '', ['class' => 'form-control', 'id' => 'order_status', 'aria-describedby'=>'order_statusHelp', 'required' => 'required']) !!}
                            <small id="order_statusHelp" class="form-text text-muted"> Status narudžbe </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cancel_order"> Otkažite narudžbu </label>
                            {!! Form::select('cancel_order', ['No' => 'Ne', 'Yes' => 'Da'], 'No', ['class' => 'form-control', 'id' => 'cancel_order', 'aria-describedby'=>'cancel_orderHelp', 'required' => 'required']) !!}
                            <small id="cancel_orderHelp" class="form-text text-muted"> Otkazivanjem narudžbe, poništavate sve prethodne akcije ! </small>
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
