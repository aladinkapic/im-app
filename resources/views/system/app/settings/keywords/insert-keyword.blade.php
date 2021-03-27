@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Vrijednost šifarnika @endsection
@section('ph-short')
    Unesite / uredite vrijednost šifarnika
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.index')}}"> Pregled svih šifarnika</a>
    / <a href="{{route('system.settings.keywords.preview-keywords', ['id' => $km->id])}}"> Šifarnici </a>
    / <a href="{{route('system.settings.keywords.insert-keywords', ['id' => $km->id])}}"> Unesite novi </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.settings.keywords.update-keyword', 'action' => 'KeywordsController@updateKeyword')) !!}
                    {!! Form::hidden('id', $object->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.settings.keywords.save-keyword', 'action' => 'KeywordsController@saveKeyword')) !!}
                @endif

                    {!! Form::hidden('keyword', $km->id, ['class' => 'form-control']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Naziv šifarnika</label>
                                {!! Form::text('title', $object->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'aria-describedby'=>'title', 'required' => 'required', 'maxlength' => '60']) !!}
                                <small id="titleHelp" class="form-text text-muted">Puni naziv šifarnika</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Naziv šifarnika (EN)</label>
                                {!! Form::text('title_en', $object->title_en ?? '', ['class' => 'form-control', 'id' => 'title_enHelp', 'aria-describedby'=>'title_en', 'required' => 'required', 'maxlength' => '60']) !!}
                                <small id="title_enHelp" class="form-text text-muted">Puni naziv šifarnika ( EN )</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Kratki opis</label>
                                {!! Form::textarea('description', $object->description ?? '', ['class' => 'form-control fc-t-80', 'id' => 'description', 'aria-describedby'=>'descriptionHelp', 'maxlength' => '120']) !!}
                                <small id="descriptionHelp" class="form-text text-muted">Kratki opis šifarnika - neobavezno</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_en">Kratki opis (EN) </label>
                                {!! Form::textarea('description_en', $object->description_en ?? '', ['class' => 'form-control fc-t-80', 'id' => 'description_en', 'aria-describedby'=>'description_enHelp', 'maxlength' => '120']) !!}
                                <small id="description_enHelp" class="form-text text-muted">Kratki opis šifarnika - neobavezno ( EN )</small>
                            </div>
                        </div>
                    </div>


                    {{--@if(isset($instance))--}}
                    {{--    <div class="row">--}}
                    {{--        <div class="col-md-12">--}}
                    {{--            <div class="form-group">--}}
                    {{--                <label for="subcategory">Kategorija šifarnika</label>--}}
                    {{--                {!! Form::select('parent', $instance, $object->parent ?? '', ['class' => 'form-control select-2', 'id' => 'parent', 'aria-describedby'=>'parentHelp']) !!}--}}
                    {{--                <small id="parentHelp" class="form-text text-muted">Podkategorija šifarnika - Ukoliko se ovaj šifarnik vezuje za neki od već definisanih</small>--}}
                    {{--            </div>--}}
                    {{--        </div>--}}
                    {{--    </div>--}}
                    {{--@endif--}}


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
