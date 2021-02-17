<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->insert(['nama' => 'Novel']);
    	DB::table('categories')->insert(['nama' => 'Buku Pelajaran']);
    	DB::table('categories')->insert(['nama' => 'Kamus']);
    }
}
