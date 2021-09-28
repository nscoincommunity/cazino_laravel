@extends('layouts.errors')

@section('title', 'Whoops, something went wrong...')

@section('content')
    <h1 class="mt-5">License Error :(</h1>
    <p class="mt-3 lead">
        License error. To create license go to <a href="{{ route('frontend.new_license') }}">the page</a>.
    </p>
@stop