<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->text(10),
            'descricao' => $this->faker->text(50),
            'concluido' => false,
            'prazo' => now(),
            'user_id' => 1,
            'categoria_id' => 1
        ];
    }
}
