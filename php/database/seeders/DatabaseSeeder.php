<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(GeneroSeeder::class);
        $this->call(NiveisSeeder::class);
        $this->call(AdminAuthSeeder::class);
    }
}
