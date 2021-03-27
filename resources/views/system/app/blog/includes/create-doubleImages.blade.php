@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Unesite novi element @endsection
@section('ph-short')
    Unesite / pregledajte vizualni element posta
    @if(isset($edit))
        | <a href="{{route('system.blog.delete-doubleImages',['id' => $dobule_images->id ?? '0'] )}}">Obrišite</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.index')}}">Svi Postovi</a>
    /   <a href="{{route('system.blog.preview-post', ['id' => $post->id])}}"> {{$post->title ?? ''}} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.blog.doubleImages.update-doubleImages', 'action' => 'BlogController@updateDoubleImages')) !!}
                    {!! Form::hidden('id', $dobule_images->id, ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.doubleImages.save-doubleImages', 'action' => 'BlogController@saveDoubleImages')) !!}
                    {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="product-photo">
                            <!-- Hidden element for file id -->
                            {!! Form::hidden('image_left', $dobule_images->image_left ?? '', ['class' => 'form-control', 'id' => 'second-photo-input']) !!}
                            <img src="{{isset($dobule_images) ? '/'.($dobule_images->leftImageRel->path ?? '').'/'.($dobule_images->leftImageRel->file ?? '') : ''}}" id="second-photo" alt="">
                            <label for="photo-return-id-second">
                                <div class="input-image-shadow t-3">
                                    <h1>700 x 700</h1>
                                </div>
                            </label>
                            <input type="file" id="photo-return-id-second" class="photo-return-id" path="{{$source}}" category="blog-double-images" photo-name="second-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-photo">
                            <!-- Hidden element for file id -->
                            {!! Form::hidden('image_right', $dobule_images->image_right ?? '', ['class' => 'form-control', 'id' => 'first-photo-input']) !!}
                            <img src="{{isset($dobule_images) ? '/'.($dobule_images->rightImageRel->path ?? '').'/'.($dobule_images->rightImageRel->file ?? '') : ''}}" id="first-photo" alt="">
                            <label for="photo-return-id-first">
                                <div class="input-image-shadow t-3">
                                    <h1>700 x 700</h1>
                                </div>
                            </label>
                            <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-double-images" photo-name="first-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
                        </div>
                    </div>
                </div>
                <br>
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
