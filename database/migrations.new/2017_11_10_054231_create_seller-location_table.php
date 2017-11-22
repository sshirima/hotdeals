<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_location', function (Blueprint $table) {
            $table->increments('slrloc_id');
            $table->unsignedInteger('fk_loc_id');
            $table->unsignedInteger('fk_slr_id');

            $table->foreign('fk_loc_id')->references('loc_id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('fk_slr_id')->references('slr_id')
                ->on('sellers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_location');
    }
}
