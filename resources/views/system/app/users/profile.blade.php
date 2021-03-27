@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user-edit"></i> @endsection
@section('ph-main')
    @if(isset($create))
        Unos korisnika
    @else
        {{$user->name ?? ''}}
    @endif
@endsection
@section('ph-short')
    @if(isset($create))
        Kreirajte korisnički nalog sa datim parametrima
    @else
        Izmijenite osnovne informacije računa
        @if(isset($preview))
            @if(isset($myProfile))
                - <a href="{{route('system.users.edit-profile')}}">Uredite informacije</a>
            @else
                - <a href="{{route('system.users.edit-user', ['id' => $user->id ?? ''])}}">Uredite informacije</a>
            @endif
        @endif
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.users.my-profile')}}">Moj profil</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    @include('system.app.users.includes.form')
@endsection
