<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenebakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penebak', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kepala_cabang');
            $table->string('alamat_idena')->nullable();
            $table->string('tipe_pembayaran')->nullable()->comment = "1: Dana, 2: Shopee Pay, 3: LinkAja";
            $table->string('no_hp_pembayaran')->nullable();
            $table->string('image_dompet')->nullable();
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
        Schema::dropIfExists('penebak');
    }
}
