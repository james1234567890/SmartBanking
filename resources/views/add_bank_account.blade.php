@extends('layout/layout')

@section('header')
    @parent
    @include ('layout/header')
@stop

@section('leftsidebar')
    @parent
    @include('layout/left_sidebar')
@stop

@section('content')
    @parent
    @include('layout/add_bank_account')
@stop

@section('rightsidebar')
    @include('layout/right_sidebar')
@stop

@section('footer')
    @parent
    @include('layout/footer')
@stop