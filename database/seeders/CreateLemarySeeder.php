<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateLemarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lemaries')->insert(['nama' => 'A-3']);
    	DB::table('lemaries')->insert(['nama' => 'B-1']);
    	DB::table('lemaries')->insert(['nama' => 'C-2']);
    }
}
