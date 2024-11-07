<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
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

        // $user = User::all()->random();

        // while (count($user->categorias) == 0){
        //     $user = User::all()->random();
        // }

        $user = User::has('categorias')->inRandomOrder()->first();

        return [
            'titulo' => $this->faker->text(10),
            'descricao' => $this->faker->text(50),
            'concluido' => $this->faker->boolean,
            'prazo' => $this->faker->dateTime,
            'user_id' => $user,
            'categoria_id' => $user->categorias->random()
        ];
    }
}
