@extends("layouts.public-layout")

@section('page-title') {{ $post->title ?? '' }} @endsection

@section('breadcrumb-left') {{ $post->title }} @endsection
@section('breadcrumb-right')
    <span>/</span>
    <a href="{{route('public-part.blog.blog')}}" class="active-l"> {{__('Novosti')}} </a>
    <span>/</span>
    <a href="{{route('public-part.blog.preview', ['id' => $post->id])}}" class="active-l"> {{ $post->title }} </a>
@endsection

@section('body')

    <div class="top-image">
        <img src="{{asset($category->imageObject())}}" alt="">
        <div class="top-image-shadow">
            <div class="image-shadow-text">
                <h5>Firma d.o.o</h5>
                <h1> {{ $post->title ?? '' }} </h1>
                <div class="shadow-image-lines">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="split-on-two">
        <div class="posts-part">
            <div class="post-wrapper preview-post-wrapper">
                <div class="post">
                    @foreach($content as $cont)
                        @if($cont->category == 'header')
                            <h3> {{ $cont->headerRel->title ?? ''}} </h3>
                        @elseif($cont->category == 'paragraph')
                            <p> {!! nl2br($cont->paragraphRel->paragraph ?? '') !!} </p>
                        @elseif($cont->category == 'dobule_images')
                            <div class="border">
                                <div class="double-image">
                                    <div class="single-image">
                                        <img src="{{asset(($cont->doubleImagesRel->leftImageRel->path ?? '').($cont->doubleImagesRel->leftImageRel->file ?? ''))}}">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset(($cont->doubleImagesRel->rightImageRel->path ?? '').($cont->doubleImagesRel->rightImageRel->file ?? ''))}}">
                                    </div>
                                </div>
                            </div>
                        @elseif($cont->category == 'slider')
                            <div class="single_image">
                                <div class="swiper-container preview-s-container swiper-{{$cont->id}}">
                                    <div class="swiper-wrapper">
                                        @foreach($cont->sliderRel as $img)
                                            <div class="swiper-slide">
                                                <img src="{{asset(($img->imageRel->path ?? '').($img->imageRel->file ?? ''))}}">
                                            </div>
                                        @endforeach
                                    </div>
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

                    <br>

                    <div class="tags-wrapper">
                        <div class="tag">
                            <a href="">general</a>
                        </div>
                        <div class="tag">
                            <a href="">awnings</a>
                        </div>
                        <div class="tag">
                            <a href="">popular</a>
                        </div>
                        <div class="tag">
                            <a href="">sale</a>
                        </div>
                        <div class="tag">
                            <a href="">brand new</a>
                        </div>
                        <div class="tag">
                            <a href="">modern</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('app.app.blog.include.categories');
    </div>

@endsection

