<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidasiHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('validasi_history', function (Blueprint $table) {
            $table->increments('id_history');
            $table->string('id_penebak');
            $table->string('epoch')->nullable();
            $table->string('age')->nullable();
            $table->string('prevstate')->nullable();
            $table->string('state')->nullable();
            $table->string('nilai')->nullable();
            $table->string('status_nilai')->nullable();
            $table->string('jumlah_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
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
        Schema::dropIfExists('validasi_history');
    }
}
