@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-shipping-fast"></i> @endsection
@section('ph-main') Unos @endsection
@section('ph-short')
    @if(isset($create))
        Unesite novu opciju dostave produkata
    @elseif(isset($preview))
        Pregled {{$shipping->title ?? ''}} - <a href="{{route('system.products.shipping.prices.insert', ['shipping_id' => $shipping->id ?? '0'])}}">Unesite cijene</a>
        / <a href="{{route('system.products.shipping.edit', ['id' => $shipping->id ?? '0'])}}">Ažurirajte</a>
        / <a href="{{route('system.products.shipping.delete', ['id' => $shipping->id ?? '0'])}}">Obrišite</a>
    @else
        Pregled {{$shipping->title ?? ''}}
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.shipping.index')}}"> Dostava </a>
    @if(isset($create))
        / <a href="{{route('system.products.shipping.create')}}"> Unos </a>
    @else
        / <a href="{{route('system.products.shipping.preview', ['id' => $shipping->id ?? ''])}}"> {{$shipping->title ?? ''}} </a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

    @if(isset($preview))
        <div class="content-wrapper content-wrapper-bs">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" width="60px" class="text-center">#</th>
                    <th scope="col">Država</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Opseg težine</th>
                    <th scope="col" width="120px" class="text-center">Akcije</th>
                </tr>
                </thead>

                <tbody>
                @php $counter = 1; @endphp
                @foreach($prices as $price)
                    <tr>
                        <th scope="row" class="text-center">{{$counter++}}</th>
                        <td>{{$price->countryRel->name ?? ''}}</td>
                        <td>{{$price->formattedPrice() ?? ''}} {{$price->currencyRel->title ?? ''}}</td>
                        <td>{{$price->weight_from ?? ''}}g - {{$price->weight_to ?? ''}}g</td>
                        <td class="text-center">
                            <a href="{{route('system.products.shipping.prices.edit', ['id' => $price->id ?? ''])}}" title="Uredite cijenu">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('system.products.shipping.prices.delete', ['id' => $price->id ?? ''])}}" title="Obrišite cijenu">
                                <i class="fas fa-trash text-danger ml-2"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <hr>
        <br>
    @endif

    <div class="content-wrapper p-3" >

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.products.shipping.update', 'action' => 'ShippingController@update')) !!}
                    {!! Form::hidden('id', $shipping->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.products.shipping.save', 'action' => 'ShippingController@save')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"> Naslov isporuke / dostave </label>
                                {!! Form::text('title', $shipping->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="titleHelp" class="form-text text-muted"> Naslov dostave </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en"> Naslov isporuke / dostave (EN)</label>
                                {!! Form::text('title_en', $shipping->title_en ?? '', ['class' => 'form-control', 'id' => 'title_en', 'aria-describedby'=>'title_enHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="title_enHelp" class="form-text text-muted"> Naslov dostave (EN)</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description"> Opis isporuke / dostave </label>
                                {!! Form::textarea('description', $shipping->description_raw ?? '-', ['class' => 'form-control fc-t-120', 'id' => 'description', 'aria-describedby'=>'descriptionHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="descriptionHelp" class="form-text text-muted"> Potpuni opis načina isporuke / dostave </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_en"> Opis isporuke / dostave (EN) </label>
                                {!! Form::textarea('description_en', $shipping->description_en_raw ?? '-', ['class' => 'form-control fc-t-120', 'id' => 'description_en', 'aria-describedby'=>'description_enHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                <small id="description_enHelp" class="form-text text-muted"> Potpuni opis načina isporuke / dostave </small>
                            </div>
                        </div>
                    </div>

                    @if(isset($create) or isset($edit))
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                            </div>
                        </div>
                    @endif
                {!! Form::close(); !!}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(function ($) {
            $("#description").shieldEditor({
                height: 260
            });
            $("#description_en").shieldEditor({
                height: 260
            });
        });
    </script>

@endsection
