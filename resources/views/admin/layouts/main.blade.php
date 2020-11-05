@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('content_header')
@stop

@section('content')
    @yield('content')
@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
