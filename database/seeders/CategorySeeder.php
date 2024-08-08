<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /*
     **
     * Preload Data to the database: we are creating 10 datas to the database
     **
     */
    public function run(): void
    {
        \App\Models\Category::factory(10)->create();
    }
}
