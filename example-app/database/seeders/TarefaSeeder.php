<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarefa::create([
            'titulo' => 'Tarefa 01',
            'descricao' => 'Descrição da Tarefa 01',
            'user_id' => 1,
            'prazo' => '2024/02/02',
            'categoria_id' => 1
        ]);
    }
}
