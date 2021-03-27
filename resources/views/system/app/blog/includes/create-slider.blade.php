@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Unesite fotografije @endsection
@section('ph-short')
    Unesite / pregledajte fotografije za slider u blog sekciji
    @if(isset($edit))
        | <a href="{{route('system.blog.slider.delete-slider',['content' => $content->id ?? '0'] )}}">Obrišite</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.index')}}">Svi Postovi</a>
    /   <a href="{{route('system.blog.preview-post', ['id' => $post->id])}}"> {{$post->title ?? ''}} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')

    <div class="content-wrapper p-3">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.blog.slider.update-image', 'action' => 'BlogController@updateImage', 'files' => true, 'enctype'=>'multipart/form-data')) !!}
                    {!! Form::hidden('content_id', $content->id, ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.slider.save-image', 'action' => 'BlogController@saveImage', 'files' => true, 'enctype'=>'multipart/form-data')) !!}
                @endif

                    {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
                    {!! Form::hidden('path', $source, ['class' => 'form-control']) !!}
                    {!! Form::hidden('category', $category, ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-gallery-images">
                                <label for="slider-image" class="form-image-label">
                                    <div id="upload-files-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>{{__('IZABERITE DATOTEKU')}}</p>
                                        <p>{{__('560 x 560')}}</p>
                                    </div>
                                </label>

                                <input type="file" id="slider-image" name="photo-input" class="gallery-image" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            @if(isset($files) and count($files))
                                <div class="content-wrapper p-3 product-wrapper mt-3">
                                    @foreach($files as $file)
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div class="preview-file-w p-3">
                                                    <div class="icon-wrapper">
                                                        <i class="far fa-file"></i>
                                                    </div>
                                                    <div class="text-wrapper">
                                                        <p>
                                                            {{$file->imageRel->file ?? ''}}
                                                        </p>
                                                        <div class="delete-file t-3" title="{{__('Obrišite fotografiju')}}">
                                                            <a href="{{route('system.blog.slider.delete-slider-image', ['id' => $file->id ?? ''])}}">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 text-right">
                        {!! Form::hidden('image', '', ['class' => 'form-control', 'id' => 'second-photo-input']) !!}
                        <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
