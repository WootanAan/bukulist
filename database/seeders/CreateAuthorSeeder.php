<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
        	'nama' => 'Aliquip Eu',
        	'deskripsi' => 'Nisi in dolor occaecat cupidatat dolore aute ut reprehenderit ut exercitation.']);
        DB::table('authors')->insert([
        	'nama' => 'Ex Consequat',
        	'deskripsi' => 'Eu sed in id in commodo amet dolor voluptate.']);
        DB::table('authors')->insert([
        	'nama' => 'Nostrud Proident',
        	'deskripsi' => 'Eu tempor cillum nostrud sunt voluptate aliquip elit dolore nostrud.']);
    }
}
