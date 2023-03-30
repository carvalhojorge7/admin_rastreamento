<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'id' => 1,
            'nivel_id' => 1,
            'email' => 'viasdefusao@softbuilder.com.br',
        ], [
            'nome' => 'Administrador',
            'password' => Hash::make('adm@viasdifusao'),
            'idade' => 0,
            'genero_id' => 3,
            'instituicao' => 'Vias de Difusão'
        ]);

        User::updateOrCreate([
            'id' => 2,
            'nivel_id' => 2,
            'email' => 'teste@softbuilder.com.br',
        ], [
            'nome' => 'Administrador',
            'password' => Hash::make('asd123asd'),
            'idade' => 0,
            'genero_id' => 3,
            'instituicao' => 'Softbuilder'
        ]);
    }
}
