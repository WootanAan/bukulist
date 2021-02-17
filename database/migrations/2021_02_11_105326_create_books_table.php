<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('author_id')->constrained();
            $table->foreignId('penerbit_id')->constrained();
            $table->foreignId('tahun_id')->constrained();
            $table->integer('tebal');
            $table->text('sinopsis')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('lemary_id')->constrained();
            $table->integer('jumlah_buku');
            $table->boolean('status');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
