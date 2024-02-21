<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pokemon;
use App\Http\Requests\PokemonFormRequest;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon :: all();

        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonFormRequest $request)
    {
        $data = $request -> all();

        $pokemon = new Pokemon();

        $pokemon -> name = $data['name'];
        $pokemon -> gender = $data['gender'];
        $pokemon -> level = $data['level'];

        $pokemon -> save();

        return redirect() -> route('pokemon.show', $pokemon -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon :: find($id);

        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon :: find($id);

        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PokemonFormRequest $request, $id)
    {
        $pokemon = Pokemon :: find($id);
        $data = $request -> all();

        $pokemon -> name = $data['name'];
        $pokemon -> gender = $data['gender'];
        $pokemon -> level = $data['level'];

        $pokemon -> save();

        return redirect() -> route('pokemon.show', $pokemon -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon = Pokemon :: find($id);
        $pokemon -> delete();

        return redirect() -> route('pokemon.index');
    }
}
