@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-euro-sign"></i> @endsection
@section('ph-main') Cijene uređaja ( {{$product->formattedPrice()}} {{$product->currencyRel->title ?? ''}} )@endsection
@section('ph-short')
    Unesite / pregledajte cijene fizičkih uređaja koje se dodaju na osnovnu cijenu koja iznosi {{$product->formattedPrice()}} {{$product->currencyRel->title ?? ''}}
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}"> .. </a>
    / <a href="{{route('system.products.products-prices.index', ['id' => $product->id])}}">Cijene uređaja</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3" >
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.products.products-prices.update', 'action' => 'ProductPricesController@update')) !!}
                    {!! Form::hidden('id', $price->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.products.products-prices.save', 'action' => 'ProductPricesController@save')) !!}
                @endif

                {!! Form::hidden('product_id', $product->id, ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keyword_module"> Šifarnik </label>
                                {!! Form::select('keyword_module', $keywords, $price->keyword_module ?? '', ['class' => 'form-control select-2 product-price-keywords', 'id' => 'keyword_module', 'aria-describedby'=>'keyword_moduleHelp', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="keyword_moduleHelp" class="form-text text-muted"> Odaberit šifarnik</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keyword_value"> Vrijednost </label>
                                {!! Form::select('keyword_value', $values, $price->keyword_value ?? '', ['class' => 'form-control select-2 ppk-values', 'id' => 'keyword_value', 'aria-describedby'=>'keyword_valueHelp', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="keyword_valueHelp" class="form-text text-muted"> Vrijednost u odnosu na odabrani šifarnik </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Cijena (MPC)</label>
                                {!! Form::number('price', isset($price) ? $price->formattedPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price', 'aria-describedby'=>'priceHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                                <small id="priceHelp" class="form-text text-muted"> Dodatna nadoplata za ovu vrstu uređaja </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="percentage">Cijena u procentima (MPC)</label>
                                {!! Form::text('percentage', $price->percentage ?? '', ['class' => 'form-control', 'id' => 'percentage', 'aria-describedby'=>'percentageHelp', 'required' => 'required', 'readonly', 'min' => 0, 'step' => '0.01']) !!}
                                <small id="percentageHelp" class="form-text text-muted"> Dodatna nadoplata za ovu vrstu uređaja - procentualno </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_wp">Cijena (VPC)</label>
                                {!! Form::number('price_wp', isset($price) ? $price->formattedWPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price_wp', 'aria-describedby'=>'price_wpHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                                <small id="price_wpHelp" class="form-text text-muted"> Dodatna nadoplata za ovu vrstu uređaja </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="percentage_wp">Cijena u procentima (VPC)</label>
                                {!! Form::text('percentage_wp', $price->percentage_wp ?? '', ['class' => 'form-control', 'id' => 'percentage_wp', 'aria-describedby'=>'percentage_wpHelp', 'required' => 'required', 'readonly', 'min' => 0, 'step' => '0.01']) !!}
                                <small id="percentage_wpHelp" class="form-text text-muted"> Dodatna nadoplata za ovu vrstu uređaja - procentualno </small>
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
