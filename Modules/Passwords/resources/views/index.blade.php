@extends('passwords::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('passwords.name') !!}</p>
@endsection
