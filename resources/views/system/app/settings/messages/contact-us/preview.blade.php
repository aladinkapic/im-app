@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-envelope-open-text"></i> @endsection
@section('ph-main') Zaprimljene poruke @endsection
@section('ph-short')
    Pregledajte sve zaprimljene poruke sa sistema putem forme
    | <a href="{{route('system.settings.keywords.messages.delete-message', ['id' => $message->id])}}"> <strong>Obrišite</strong> </a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.messages.preview-messages')}}"> Zaprimljene poruke </a>
    / <a href="{{route('system.settings.keywords.messages.preview-message', ['id' => $message->id])}}"> Pregled poruke </a>
@endsection


<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper p-3">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> Ime i prezime </label>
                            {!! Form::text('name', $message->name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"> Email </label>
                            {!! Form::text('email', $message->email, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="subject"> Naslov poruke </label>
                            {!! Form::text('subject', $message->subject, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Sadržaj poruke</label>
                            {!! Form::textarea('message', $message->message ?? '', ['class' => 'form-control fc-t-160', 'id' => '', 'readonly']) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
