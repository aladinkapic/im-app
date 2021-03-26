@extends('layouts.layout')

@section('body')
    {{auth()->user()->name}}
@stop
