<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName(),
            'marca' => $this->faker->company(),
            'ano' => $this->faker->numberBetween(1970, 2025),
            'categoria_id' => Categoria::all()->random()->id,
            'quantidade' => $this->faker->numberBetween(1, 20),
            'imagem' => 'https://picsum.photos/'.rand(150, 300),
        ];
    }
}