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
        <form action="{{ route('pokemon.store') }}" method="POST">

            @csrf
            @method('POST')

            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="M">M</option>
                <option value="F">F</option>
                <option value="X">X</option>
            </select>
            <br>
            <label for="level">Level</label>
            <input type="number" name="level" id="level">
            <br><br>
            <input type="submit" value="CREATE">
        </form>
    </div>

@endsection
