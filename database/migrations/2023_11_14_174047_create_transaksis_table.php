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
            $table->timestamps();
            $table->string('produkID')->nullable();
            $table->string('nomorTransaksi')->nullable();
            $table->string('noResi')->nullable();
            $table->string('kurir')->nullable();
            $table->float('ongkir')->nullable();
            $table->float('total')->nullable();
            $table->string('status')->default('Pending');
            $table->date('date')->nullable();
            $table->text('address')->nullable();
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
