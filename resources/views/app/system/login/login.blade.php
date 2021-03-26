@extends('layouts.layout')

@section('title') {{__('Prijavite se')}} @stop

@section('head')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>
@stop

@section('body')
    <div class="left_images">
        <img src="{{asset('images/includes/scyfer.jpg')}}" alt="">
    </div>

    <div class="right_part">
        <div class="inside_div">

            <div class="name_of_app">
                <h1>Alkaris d.o.o Sarajevo</h1>
            </div>
            <div class="div_with_message">
                <h2>Dobrodošli nazad.</h2>
                <p>Molimo unesite vaše podatke </p>
            </div>

            <!-- --------------------------------------------------------------------------------------------------- -->
            <div class="input_forms">
                <div class="single_input_col">
                    <div class="single_input_label">
                        <p>Vaš eMail</p>
                    </div>
                    <div class="single_input_input">
                        <input type="text" autocomplete="off" id="email">
                    </div>
                </div>
                <div class="single_input_col single_input_col2">
                    <div class="single_input_label">
                        <p>Šifra</p>
                    </div>
                    <div class="single_input_input">
                        <input type="password" autocomplete="off" id="password">
                    </div>
                </div>
            </div>

            <div class="checkbox">
                <div class="stay-signed">
                    <input type="checkbox" name="set-cookies" id="set-cookies">
                    <p>Ostavi me prijavljenog</p>
                </div>
                <div class="register-form-w register-form-n">
                    <a href="">
                        <p>{{__('|')}}</p>
                    </a>
                </div>
            </div>

            <div class="buttons">
                <div class="button" id="sign-me-in">
                    <p>PRIJAVI ME</p>
                </div>
{{--                <div class="forgot_passw">--}}
{{--                    <a href="#">--}}
{{--                        <p>Zaboravili ste šifru?</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>

            <div class="sign_link">
                <!-- <a href="#">
                    Nemate još nalog? <span>Registrujte se</span>
                </a> -->
            </div>
        </div>
    </div>
@stop
