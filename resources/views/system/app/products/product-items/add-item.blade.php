@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-laptop-code"></i> @endsection
@section('ph-main')  @if(isset($edit)) Pregled uređaja @else Unesite uređaj @endif @endsection
@section('ph-short') Unos / pregled fizičkog uređaja - Unesite uređaj koji je podoban za korisničku isporuku @if(isset($edit)) - <a href="">Obrišite</a> @endif @endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id])}}">{{$product->title ?? ''}}</a>
    @if(isset($edit))
        / <a href="{{route('system.products.products-items.edit-item', ['item_id' => $item->id])}}">{{$item->item_id}}</a>
    @else
        / <a href="{{route('system.products.products-items.add-item', ['id' => $product->id])}}">Unesite uređaj</a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3 product-wrapper" product-id="{{isset($product) ? $product->id : 'empty'}}" product-title="{{isset($product) ? $product->title : ''}}">

        <div class="row">
            <div class="col-md-12">
            @if(isset($edit))
                    {!! Form::open(array('route' => 'system.products.products-items.update-item', 'action' => 'ProductItemController@updateItem')) !!}
                    {!! Form::hidden('id', $item->id, ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.products.products-items.save-item', 'action' => 'ProductItemController@saveItem')) !!}
                @endif

                {!! Form::hidden('product_id', $product->id ?? '0', ['class' => 'form-control']) !!}

                <div class="row">
                    <div class="col-md-6 pb-3">
                        <h4>Informacije o proizvodu</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_id">ID proizvoda</label>
                            {!! Form::text('item_id', $item->item_id ?? $hash, ['class' => 'form-control', 'id' => 'item_id', 'aria-describedby'=>'item_idHelp', 'readonly']) !!}
                            <small id="item_idHelp" class="form-text text-muted"> Jedinstveni broj svakog proizvoda - za WiFi uređajte potrebno generisanje od strane administratora </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_password">Šifra proizvoda</label>
                            {!! Form::text('item_password', $item->item_password ?? '', ['class' => 'form-control', 'id' => 'item_password', 'aria-describedby'=>'item_passwordHelp']) !!}
                            <small id="item_passwordHelp" class="form-text text-muted"> Šifra za authentifikaciju i pristup uređaju </small>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 pb-3">
                        <h4>Poveznica sa šifarnicima</h4>
                    </div>
                </div>

                <div class="row">
                    @foreach($affiliations as $a)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keyword_value">{{$a['title']}}</label>
                                {!! Form::select('keyword_value[]', $a['values'], $a['chosen'] ?? '', ['class' => 'form-control', 'id' => 'keyword_value', 'aria-describedby'=>'keyword_valueHelp']) !!}
                                <small id="keyword_valueHelp" class="form-text text-muted"> Poveznica sa šifarnikom - {{$a['title']}} </small>

                                {!! Form::hidden('keyword[]', $a['keyword'], ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    @endforeach
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
