@extends('layout.main')
@section('content')
    <h1>Bem Vindo </h1>
    {{ print_r(session('user')) }}
@endsection