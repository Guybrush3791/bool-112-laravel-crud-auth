@extends('layouts.app')
@section('content')

    <div class="text-center mt-5">
        <h1>Pokemon</h1>
        <h2>Name: {{ $pokemon -> name }}</h2>
        <h2>Gender: {{ $pokemon -> gender }}</h2>
        <h2>Level: {{ $pokemon -> level }}</h2>
    </div>

@endsection
