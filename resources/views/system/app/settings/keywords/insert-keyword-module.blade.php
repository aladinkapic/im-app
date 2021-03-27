@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Modul šifarnika @endsection
@section('ph-short')
    Generičko kreiranje šifarnika - radi lakših dorada u budućnosti
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.index')}}"> Pregled svih šifarnika</a>
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
                    {!! Form::open(array('route' => 'system.settings.keywords.save-keyword-module', 'action' => 'KeywordsController@saveKeywordModule')) !!}
                @endif


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keyword">Šifarnik</label>
                                {!! Form::text('public_title', $object->public_title ?? '', ['class' => 'form-control', 'id' => 'public_title', 'aria-describedby'=>'public_titleHelp', 'maxlength' => '60']) !!}
                                <small id="public_titleHelp" class="form-text text-muted"> Prikaz na filterima - npr (Pametne svjetiljke - boja :: Boja) </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Naziv šifarnika</label>
                                {!! Form::text('title', $object->title ?? '', ['class' => 'form-control', 'id' => 'title', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => '60']) !!}
                                <small id="titleHelp" class="form-text text-muted">Naziv šifarnika</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent">Povezanost sa drugim šifarnikom</label>
                                {!! Form::select('parent', $parents, $object->parent ?? '', ['class' => 'form-control select-2', 'id' => 'parent', 'aria-describedby'=>'parentHelp']) !!}
                                <small id="parentHelp" class="form-text text-muted"> Podkategorija šifarnika - Ukoliko se odabere, keyword vrijednost postaje ID od glavnog šifarnika </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_as">Način prikazivanja</label>
                                {!! Form::select('display_as', ['dropdown' => 'Dropdown meni', 'inline' => 'Inline'], $object->display_as ?? '', ['class' => 'form-control', 'id' => 'display_as', 'aria-describedby'=>'display_asHelp']) !!}
                                <small id="display_asHelp" class="form-text text-muted"> Način prikazivanja u filterima - Da li je riječ o Dropdown meniju ili inline kvadratići </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="additional"> Dodatne informacije </label>
                                {!! Form::select('additional', ['hidden' => 'Dodatne informacije', 'image' => 'Fotografija', 'property' => 'Atribut uređaja'], $object->additional ?? 'hidden', ['class' => 'form-control', 'id' => 'additional', 'aria-describedby'=>'additionalHelp']) !!}
                                <small id="additionalHelp" class="form-text text-muted"> Fotografija - Atribut uređaja - Dodatne informacije </small>
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
