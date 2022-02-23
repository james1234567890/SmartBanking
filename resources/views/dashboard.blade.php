@extends('layout/layout')

@section('header')
    @include ('layout/header')
@stop

@section('leftsidebar')
    @include('layout/left_sidebar')
@stop

@section('content')
    @include('layout/dashboard')
@stop

@section('rightsidebar')
    @include('layout/right_sidebar')
@stop

@section('footer')
    @include('layout/footer')
@stop
