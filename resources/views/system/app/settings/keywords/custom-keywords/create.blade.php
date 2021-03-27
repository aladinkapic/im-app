@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{$value}} @endsection
@section('ph-short')
    Unesite / uredite vrijednost dodatnih šifarnika
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.preview-custom-keywords', ['key' => $key])}}"> Dodatni šifarnici </a>
    / <a href="{{route('system.settings.keywords.create-custom-keywords', ['key' => $key])}}">Unesite novi</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.settings.keywords.save-custom-keywords', 'action' => 'KeywordsController@saveCustomKeyword')) !!}

                {!! Form::hidden('keyword', $key, ['class' => 'form-control']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Naziv šifarnika</label>
                            {!! Form::text('title', $object->title ?? '', ['class' => 'form-control', 'id' => 'title', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => '60']) !!}
                            <small id="titleHelp" class="form-text text-muted">Puni naziv šifarnika</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Naziv šifarnika (EN)</label>
                            {!! Form::text('title_en', $object->title_en ?? '', ['class' => 'form-control', 'id' => 'title_en', 'aria-describedby'=>'title_enHelp', 'required' => 'required', 'maxlength' => '60']) !!}
                            <small id="title_enHelp" class="form-text text-muted">Puni naziv šifarnika ( EN )</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="keyword_hidden"> Šifra šifarnika </label>
                            {!! Form::text('keyword_hidden', $object->title ?? '', ['class' => 'form-control', 'id' => 'keyword_hidden', 'aria-describedby'=>'keyword_hiddenHelp', 'required' => 'required', 'maxlength' => '60']) !!}
                            <small id="keyword_hiddenHelp" class="form-text text-muted"> Šifra šifarnika - način za raspoznavanje </small>
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
