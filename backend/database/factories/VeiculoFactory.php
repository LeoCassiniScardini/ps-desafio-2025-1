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
            'nome' => $this->faker->word(),
            'marca' => $this->faker->company(),
            'ano' => $this->faker->numberBetween(2000, 2025),
            'imagem' => $this->faker->imageUrl(640, 480, 'cars', true),
            'categoria_id' => Categoria::factory(),
            'quantidade' => $this->faker->numberBetween(1, 20),
        ];
    }
}