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

        User::factory(2)->create();

        $users = User::all();

        foreach($users as $user){
            Categoria::factory(2)->create([
                'user_id' => $user->id,
            ]);
        }


        foreach($users as $user){
            $categorias = Categoria::select()->where('user_id', $user->id)->get();
            foreach($categorias as $categoria){
                Tarefa::factory(5)->create([
                    'user_id' => $user->id,
                    'categoria_id' => $categoria->id
                ]);
            }
        }



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'testYYYYYYYYYYYYYY@example.com',
        // ]);


    }
}
