@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-images"></i> @endsection
@section('ph-main') Unesite slider @endsection
@section('ph-short')
    Unesite / pregledajte slider na naslovnoj strani
    @if(isset($slide))
        | <a href="{{route('system.homepage.slider.delete', ['id' => $slide->id])}}"> {{__('Obrišite')}} </a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.homepage.slider.index')}}">{{__('Slider')}}</a>
    @if(isset($create))
        / <a href="{{route('system.homepage.slider.create')}}">{{__('Unesite novi')}}</a>
    @else
        / <a href="{{route('system.homepage.slider.edit', ['id' => $slide->id])}}">{{$slide->title ?? ''}}</a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.homepage.slider.update', 'action' => 'SliderController@update')) !!}
                    {!! Form::hidden('id', $slide->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.homepage.slider.save', 'action' => 'SliderController@save')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {!! Form::hidden('image', $slide->image ?? '', ['class' => 'form-control', 'id' => 'first-photo-input']) !!}
                                <img src="{{isset($slide) ? '/'.($slide->imageRel->path ?? '').'/'.($slide->imageRel->file ?? '') : ''}}" id="first-photo" alt="">
                                @if(isset($create))
                                    <label for="photo-return-id-first">
                                        <div class="input-image-shadow t-3">
                                            <h1>1920 x 970</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-double-images" photo-name="first-photo" name="photo-input" url="{{route('system.images.save-image')}}">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {!! Form::hidden('image_mobile', $slide->image_mobile ?? '', ['class' => 'form-control', 'id' => 'second-photo-input']) !!}
                                <img src="{{isset($slide) ? '/'.($slide->mobileImageRel->path ?? '').'/'.($slide->mobileImageRel->file ?? '') : ''}}" id="second-photo" alt="">
                                @if(isset($create))
                                    <label for="photo-return-id-second">
                                        <div class="input-image-shadow t-3">
                                            <h1>720 x 960</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-second" class="photo-return-id" path="{{$source}}" category="blog-double-images" photo-name="second-photo" name="photo-input" url="{{route('system.images.save-image')}}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"> {{__('Naslov')}} </label>
                                {!! Form::text('title', $slide->title ?? '', ['class' => 'form-control', 'id' => 'title', 'aria-describedby'=>'titleHelp', 'required' => 'required']) !!}
                                <small id="titleHelp" class="form-text text-muted"> {{__('Naslov posta')}} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link"> Link </label>
                                {!! Form::text('link', $slide->link ?? '', ['class' => 'form-control', 'id' => 'link', 'aria-describedby'=>'linkHelp', 'required' => 'required']) !!}
                                <small id="linkHelp" class="form-text text-muted"> {{__('Link na koji će voditi')}} </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description"> {{__('Kratki opis')}} </label>
                                {!! Form::textarea('description', $slide->description ?? '', ['class' => 'form-control fc-t-120', 'id' => 'description', 'aria-describedby'=>'descriptionHelp', 'required' => 'required']) !!}
                                <small id="descriptionHelp" class="form-text text-muted"> {{__('Kratki opis')}} </small>
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
