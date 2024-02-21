@extends('layouts.app')
@section('content')

    <div class="text-center mt-5">
        <h1>
            Pokemon
            @auth
             - <a href="{{ route('pokemon.create') }}">CREATE</a>
            @endauth
        </h1>

        <br><br>
        <ul>
            @foreach ($pokemons as $pokemon)
                <li>
                    <a href="{{ route('pokemon.show', $pokemon -> id) }}">
                        {{ $pokemon -> name }}
                    </a>
                    @auth
                    - <a href="{{ route('pokemon.edit', $pokemon -> id) }}">EDIT</a>
                    - <form
                        action="{{ route('pokemon.delete', $pokemon -> id) }}"
                        method="POST"
                        style="display: inline-block"
                    >
                        @csrf
                        @method("DELETE")

                        <input type="submit" value="DELETE">
                    </form>
                    @endauth
                </li>
            @endforeach
        </ul>
    </div>

@endsection
