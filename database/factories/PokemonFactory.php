<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake() -> unique() -> word,
            "gender" => fake() -> randomElement(['M', 'F', 'X']),
            "level" => fake() -> numberBetween(1, 100),
        ];
    }
}
