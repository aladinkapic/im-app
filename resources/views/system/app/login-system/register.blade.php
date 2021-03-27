<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> {{__('Kreirajte korisnički nalog')}} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/public/logo.ico')}}"/>

    <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>

    <!-- Javascript scripts -->
    <script src="{{asset('js/system.js')}}"></script>
</head>
<body>
<div class="left_images">
    <img src="{{asset('images/includes/scyfer.jpg')}}" alt="">
</div>

<div class="right_part">
    <div class="inside_div">
        <div class="div_with_message div_with_message-2">
            <h2> Kreirajte korisnički račun </h2>
            <p> Nakon popunjavanja podataka, molimo potvrdite kreiranje računa putem Vašem email-a! </p>
        </div>

        <!-- --------------------------------------------------------------------------------------------------- -->

        <div class="register-wrapper">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('route' => 'login-system.save-data', 'action' => 'RegisterController@saveData')) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Ime i prezime</label>
                                {!! Form::text('name', $user->name ?? '', ['class' => 'form-control', 'id' => 'name', 'aria-describedby'=>'nameHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                                <small id="nameHelp" class="form-text text-muted">Vaše puno ime i prezime</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::email('email', $user->email ?? '', ['class' => 'form-control', 'id' => 'email', 'aria-describedby'=>'emailHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if(isset($error) and $error['code'] === "23000")
                                        <b><span class="text-danger">{{$error['message'] ?? ''}}</span></b>
                                    @else
                                        Vaša adresa elektronske pošte
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'aria-describedby'=>'passwordHelp', 'required' => 'required']) !!}
                                <small id="passwordHelp" class="form-text text-muted">Vaša lozinka za prijavu</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Broj telefona</label>
                                {!! Form::text('phone', $user->phone ?? '(00387) ', ['class' => 'form-control', 'id' => 'phone', 'aria-describedby'=>'phoneHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                                <small id="passwordHelp" class="form-text text-muted"> Broj telefona unesite u formatu (00)387 XX XXX - XXX</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Adresa</label>
                                {!! Form::text('address', $user->address ?? '', ['class' => 'form-control', 'id' => 'address', 'aria-describedby'=>'addressHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                                <small id="addressHelp" class="form-text text-muted">Vaša trenutna adresa boravišta</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="postal_code">Poštanski broj</label>
                                {!! Form::number('post_code', $user->post_code ?? '', ['class' => 'form-control', 'id' => 'postal_code', 'aria-describedby'=>'', 'min' => '0', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">Grad</label>
                                {!! Form::text('city', $user->city ?? '', ['class' => 'form-control', 'id' => 'city', 'aria-describedby'=>'', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Država</label>
                                {!! Form::select('country', ['0' => 'BiH', '1' => 'Croatia'], $user->country ?? '', ['class' => 'form-control select-2', 'id' => 'country', 'aria-describedby'=>'', isset($preview) ? 'disabled => true' : '']) !!}
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-sm btn-secondary">Kreirajte račun</button>
                            </div>
                        </div>
                    {!! Form::close(); !!}
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
