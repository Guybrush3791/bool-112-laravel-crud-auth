@extends('layouts.app')
@section('content')

    <div class="text-center mt-5">
        <h1>CREATE NEW POKEMON</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('pokemon.update', $pokemon -> id) }}" method="POST">

            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $pokemon -> name }}">
            <br>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="M"
                    @if ($pokemon -> gender == 'M')
                        selected
                    @endif
                >M</option>
                <option value="F"
                    @if ($pokemon -> gender == 'F')
                        selected
                    @endif
                >F</option>
                <option value="X"
                    @if ($pokemon -> gender == 'X')
                        selected
                    @endif
                >X</option>
            </select>
            <br>
            <label for="level">Level</label>
            <input type="number" name="level" id="level" value="{{ $pokemon -> level }}">
            <br><br>
            <input type="submit" value="UPDATE">
        </form>
    </div>

@endsection
