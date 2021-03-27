<div class="content-wrapper p-3 product-wrapper" product-id="{{isset($product) ? $product->id : 'empty'}}" product-title="{{isset($product) ? $product->title : ''}}">

    <div class="row">
        <div class="col-md-12">
            @if(isset($edit))
                {!! Form::open(array('route' => 'system.products.update-product', 'action' => 'ProductController@updateProduct')) !!}
                {!! Form::hidden('id', $product->id ?? '', ['class' => 'form-control']) !!}
            @else
                {!! Form::open(array('route' => 'system.products.save-product', 'action' => 'ProductController@saveProduct')) !!}
            @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Naziv proizvoda</label>
                            {!! Form::text('title', $product->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                            <small id="titleHelp" class="form-text text-muted">Puni naziv proizvoda</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title_en">Naziv proizvoda (EN)</label>
                            {!! Form::text('title_en', $product->title_en ?? '-', ['class' => 'form-control', 'id' => 'title_enHelp', 'aria-describedby'=>'title_enHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                            <small id="titleHelp" class="form-text text-muted">Puni naziv proizvoda ( EN )</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Kategorija proizvoda</label>
                            {!! Form::select('category', $category, $product->category ?? '', ['class' => 'form-control', 'id' => 'categoryHelp', 'aria-describedby'=>'categoryHelp', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="categoryHelp" class="form-text text-muted">Glavna kategorija proizvoda. Podkategorija se naknadno unosi !</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Proizvod objavljen</label>
                            {!! Form::select('published', [0 => 'Ne', 1 => 'Da'], $product->published ?? '', ['class' => 'form-control', 'id' => 'published', 'aria-describedby'=>'publishedHelp', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="publishedHelp" class="form-text text-muted"> Objavljivanjem proizvoda, isti postaje vidljiv javnosti </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="short_description">Kratki opis</label>
                            {!! Form::text('short_description', $product->short_description ?? '', ['class' => 'form-control', 'id' => 'short_description', 'aria-describedby'=>'short_descriptionHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                            <small id="short_descriptionHelp" class="form-text text-muted">Kratki opis proizvoda - globalni pregled</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="short_description_en">Naziv proizvoda (EN)</label>
                            {!! Form::text('short_description_en', $product->short_description_en ?? '-', ['class' => 'form-control', 'id' => 'short_description_en', 'aria-describedby'=>'short_description_enHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                            <small id="short_description_enHelp" class="form-text text-muted">Puni naziv proizvoda ( EN )</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Cijena (MPC)</label>
                            {!! Form::number('price', isset($product) ? $product->formattedPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price', 'aria-describedby'=>'priceHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                            <small id="priceHelp" class="form-text text-muted">Cijena osnovnog proizvoda - Maloprodajna cijena u BAM</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price_wp">Cijena (VPC)</label>
                            {!! Form::number('price_wp', isset($product) ? $product->formattedWPrice() ?? '' : '', ['class' => 'form-control', 'id' => 'price_wp', 'aria-describedby'=>'price_wpHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            <small id="priceHelp" class="form-text text-muted">Cijena osnovnog proizvoda - Veleprodajna cijena u BAM</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price_percentage"> Cijena u procentima </label>
                            {!! Form::number('price_percentage', $product->price_percentage ?? '', ['class' => 'form-control', 'id' => 'price_percentage', 'aria-describedby'=>'price_percentageHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 100, 'step' => '1']) !!}
                            <small id="price_percentageHelp" class="form-text text-muted"> Ukoliko je manje od 100, odnosi se na popust u procentima </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">Težina proizvoda</label>
                            {!! Form::number('weight', $product->weight ?? '', ['class' => 'form-control', 'id' => 'weight', 'aria-describedby'=>'weightHelp', 'required' => 'required', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => '0.01']) !!}
                            <small id="weightHelp" class="form-text text-muted"> Maksimalna težina proizvoda u gramima</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Detaljan opis artikla</label>
                            {!! Form::textarea('description', $product->description ?? '', ['class' => 'form-control fc-t-160', 'id' => 'description', 'aria-describedby'=>'descriptionHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="descriptionHelp" class="form-text text-muted">Detaljan opis artikla - sve ostale informacije</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description_en">Detaljan opis artikla (EN)</label>
                            {!! Form::textarea('description_en', $product->description_en ?? '', ['class' => 'form-control fc-t-160', 'id' => 'description_en', 'aria-describedby'=>'description_enHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="description_enHelp" class="form-text text-muted">Detaljan opis artikla - sve ostale informacije</small>
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


