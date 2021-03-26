@extends('layouts.public-layout')

@section('breadcrumb-left') {{__('Dobrodošli na webstranicu Firma D.O.O')}} @endsection
@section('breadcrumb-right') <a href="#">{{__('O nama')}}</a> @endsection

@section('body')
    @include('app.app.homepage.slider')

    <!-- Our services -->
    @include('app.app.homepage.our-services')

    <!-- Element -->
    @include('app.app.homepage.element')

    <!-- POSTS -->
    @include('app.app.homepage.posts')
@stop
