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
            $table->increments('id_penebak');
            $table->string('name_penebak');
            $table->string('id_kepala_cabang');
            $table->string('alamat_idena')->nullable();
            $table->string('id_dompet')->nullable()->comment = "1: Dana, 2: Shopee Pay, 3: LinkAja";
            $table->string('no_pembayaran')->nullable();
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
