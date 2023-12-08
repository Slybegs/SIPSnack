<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('produkID')->nullable();
            $table->string('nama')->nullable();
            $table->string('kategori')->nullable();
            $table->decimal('harga_beli')->nullable();
            $table->decimal('harga_jual')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('expired')->nullable();
            $table->integer('berat')->nullable();
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produks');
    }
}
