@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Unesite / uredite kategoriju @endsection
@section('ph-short')
    Unesite / uredite kategorije postove iz blog sekcije
    @if(isset($edit))
    | <a href="{{route('system.blog.categories.delete', ['id' => $category->id])}}"><strong>Obrišite</strong></a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.categories.index')}}"> Kategorije postova </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.blog.categories.update', 'action' => 'BlogCategoriesController@update')) !!}
                    {!! Form::hidden('id', $category->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.categories.save', 'action' => 'BlogCategoriesController@save')) !!}
                @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-photo">
                                {!! Form::hidden('image_id', $category->image_id ?? '', ['class' => 'form-control', 'id' => 'first-photo-input']) !!}
                                <img src="{{isset($category->imageRel) ? $category->imageObject() : ''}}" id="first-photo" alt="">
                                <label for="photo-return-id-first">
                                    <div class="input-image-shadow t-3">
                                        <h1>1920 x 450</h1>
                                    </div>
                                </label>
                                <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('system.blog.categories.save-image')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Naslov Posta</label>
                                        {!! Form::text('title', $category->title ?? '', ['class' => 'form-control', 'id' => 'title', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title_en">Naslov Posta (EN)</label>
                                        {!! Form::text('title_en', $category->title_en ?? '', ['class' => 'form-control', 'id' => 'title_en', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
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
