<?php

namespace Database\Seeders;

use App\Models\Niveis;
use Illuminate\Database\Seeder;

class NiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Niveis::updateOrCreate(['id' => 1], ['descricao' => 'Admin']);
        Niveis::updateOrCreate(['id' => 2], ['descricao' => 'Usuario']);
    }
}
