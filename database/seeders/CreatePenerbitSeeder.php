<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penerbits')->insert([
        	'nama' => 'Aliquip',
        	'deskripsi' => 'Dolore cillum pariatur irure fugiat dolor aliqua aliqua et sit in in ea veniam in.']);
        DB::table('penerbits')->insert([
        	'nama' => 'Ut',
        	'deskripsi' => 'Lorem ipsum amet proident veniam elit ea occaecat dolor sit laborum sunt dolore do occaecat eu do ad in.']);
        DB::table('penerbits')->insert([
        	'nama' => 'Eu',
        	'deskripsi' => 'Ut excepteur do in incididunt aliqua dolor aliquip ut est nostrud et.']);
    }
}
