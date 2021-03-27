@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main')
    @if(isset($create))
        Kreirajte post
    @else
        {{$post->title ?? ''}}
    @endif
@endsection
@section('ph-short')
    Unesite / pregledajte informacije o novostima u blog sekciji
    @if(isset($preview))
        | <a href="{{route('system.blog.edit-post', ['id' => $post->id])}}"> Uredite post </a>
        | <a href="{{route('system.blog.delete-post', ['id' => $post->id])}}"> Obrišite post </a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.index')}}">Svi Postovi</a>
    @if(isset($post))
        /   <a href="{{route('system.blog.preview-post', ['id' => $post->id])}}"> {{$post->title ?? ''}} </a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.blog.update-post', 'action' => 'BlogController@updatePost')) !!}
                    {!! Form::hidden('id', $post->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.save-post', 'action' => 'BlogController@savePost')) !!}
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Kategorije posta</label>
                                        {!! Form::select('category', $categories, $post->category ?? '', ['class' => 'form-control', 'id' => 'category', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="published">Objavljeno</label>
                                        {!! Form::select('published', [0 => 'Ne', 1 => 'Da'], $post->published ?? '', ['class' => 'form-control', 'id' => 'published', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Naslov Posta</label>
                                        {!! Form::text('title', $post->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Naslov Posta (EN)</label>
                                        {!! Form::text('title_en',  $post->title_en ?? '', ['class' => 'form-control', 'id' => 'title_enHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="short_description">Kratki opis</label>
                                        {!! Form::textarea('short_description', $post->short_description ?? '', ['class' => 'form-control fc-t-120', 'id' => 'short_description', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="short_description_en">Kratki opis (EN)</label>
                                        {!! Form::textarea('short_description_en', $post->short_description_en ?? '', ['class' => 'form-control fc-t-120', 'id' => 'short_description_en', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description_en"> Fotografija za naslovnu </label>
                            </div>
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {!! Form::hidden('home_image_id', $post->home_image_id ?? '', ['class' => 'form-control', 'id' => 'first-photo-input']) !!}
                                <img src="{{isset($post) ? $post->homeImageObject() : ''}}" id="first-photo" alt="">
                                @if(!isset($preview))
                                    <label for="photo-return-id-first">
                                        <div class="input-image-shadow t-3">
                                            <h1>450 x 300</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description_en"> Fotografija </label>
                            </div>
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {!! Form::hidden('image_id', $post->image_id ?? '', ['class' => 'form-control', 'id' => 'second-photo-input']) !!}
                                <img src="{{isset($post) ? $post->imageObject() : ''}}" id="second-photo" alt="">
                                @if(!isset($preview))
                                    <label for="photo-return-id-second">
                                        <div class="input-image-shadow t-3">
                                            <h1>900 x 360</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-second" class="photo-return-id" path="{{$source}}" category="blog-home-image" photo-name="second-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
                                @endif
                            </div>
                        </div>
                    </div>

                @if(!isset($preview))
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                        </div>
                    </div>
                @endif
                {!! Form::close(); !!}

                <!----------------------------------------------------------------------------------------------------->

                @if(isset($preview))
                    <br>
                    <div class="p-0">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="#">Sadržaj posta</a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto"></ul>
                                <form class="form-inline my-2 my-lg-0">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('system.blog.header.create', ['id' => $post->id ?? '0'])}}">Naslov</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('system.blog.paragraph.create',['id' => $post->id ?? '0'] )}}">Paragraf</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('system.blog.doubleImages.create',['id' => $post->id ?? '0'] )}}">Dvije fotografije</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('system.blog.slider.create',['id' => $post->id ?? '0'] )}}">Slider</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </nav>

                        @foreach($content as $cont)
                            @if($cont->category == 'header')

                                <div class="header_one header_one_full">
                                    <div class="header_line"></div>
                                    <h1><b>{{$cont->headerRel->title ?? ''}}</b></h1>
                                    <a href="{{route('system.blog.edit-header',['id' => $cont->headerRel->id] )}}" title="Uredite naslov posta">
                                        <button style="float: right" class="btn-dark btn-xs"><b>Uredite</b></button>
                                    </a>
                                </div>

                            @elseif($cont->category == 'dobule_images')

                                <div class="double-image">
                                    <div class="single-image">
                                        <img src="{{asset(($cont->doubleImagesRel->leftImageRel->path ?? '').($cont->doubleImagesRel->leftImageRel->file ?? ''))}}">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset(($cont->doubleImagesRel->rightImageRel->path ?? '').($cont->doubleImagesRel->rightImageRel->file ?? ''))}}">
                                    </div>
                                </div>
                                <br><br>
                                <a href="{{route('system.blog.edit-doubleImages', ['id' => $cont->doubleImagesRel->id ?? '0'] )}}" title="Uredite vizeulni element">
                                    <button style="float: right" class="btn-dark btn-xs"><b> Uredite </b></button>
                                </a>

                            @elseif($cont->category == 'paragraph')

                                <div class="right_text right_text_full mb-4">
                                    <div class="header_line"></div>
                                    <div class="right_text_box">
                                        <p>{!! $cont->paragraphRel->paragraph !!}</p>
                                        <a href="{{route('system.blog.edit-paragraph',['id' => $cont->paragraphRel->id ?? '0'] )}}" title=" Uredite paragraf posta ">
                                            <button style="float: right" class="btn-dark btn-xs"><b> Uredite </b></button>
                                        </a>
                                    </div>
                                </div>

                            @elseif($cont->category == 'slider')
                                <div class="single_image mt-4">
                                    <div class="swiper-container swiper-{{$cont->id}}">
                                        <div class="swiper-wrapper">
                                            @foreach($cont->sliderRel as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{asset(($img->imageRel->path ?? '').($img->imageRel->file ?? ''))}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a href="{{route('system.blog.slider.edit-slider', ['content' => $cont->id] )}}" title="Uredite / pregledajte fotografije">
                                            <button style="float: right" class="btn-dark btn-xs"><b>Uredite</b></button>
                                        </a>
                                    </div>

                                    <script>
                                        let swiper_{{$cont->id}} = new Swiper('.swiper-{{$cont->id}}', {
                                            slidesPerView: 1,
                                            spaceBetween: 30,
                                            navigation: {
                                                nextEl: '.swiper-button-next',
                                                prevEl: '.swiper-button-prev',
                                            }
                                        });
                                    </script>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
