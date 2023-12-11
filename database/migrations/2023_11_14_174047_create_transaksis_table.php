<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('userID')->nullable();
            $table->bigInteger('bankID')->nullable();
            $table->string('nomorTransaksi')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('noResi')->nullable();
            $table->string('kurir')->nullable();
            $table->float('total')->nullable();
            $table->float('totalHPP')->nullable();
            $table->string('status')->default('Pending');
            $table->string('namaPenerima')->nullable();
            $table->string('noHandphonePenerima')->nullable();
            $table->text('alamatPenerima')->nullable();
            $table->string('buktiPembayaran')->nullable();
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
        Schema::drop('transaksis');
    }
}
