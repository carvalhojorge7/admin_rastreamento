<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::updateOrCreate(['id' => 1], ['genero' => 'Masculino']);
        Genero::updateOrCreate(['id' => 2], ['genero' => 'Feminino']);
        Genero::updateOrCreate(['id' => 3], ['genero' => 'Não Informado']);
    }
}
