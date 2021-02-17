<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateTahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahuns')->insert(['tahun' => 2000]);
    	DB::table('tahuns')->insert(['tahun' => 2001]);
    	DB::table('tahuns')->insert(['tahun' => 2003]);
    }
}