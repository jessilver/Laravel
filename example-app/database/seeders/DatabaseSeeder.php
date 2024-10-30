<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Categoria;
use \App\Models\Tarefa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call([
        //     UserSeeder::class,
        //     CategoriaSeeder::class,
        //     TarefaSeeder::class
        // ]);

        User::factory(200)->create();
        Categoria::factory(500)->create();
        Tarefa::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
