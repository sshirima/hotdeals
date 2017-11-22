<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('loc_id');
            $table->unsignedInteger('fk_crd_id')->nullable();
            $table->unsignedInteger('fk_reg_id');

            $table->foreign('fk_crd_id')->references('crd_id')
                ->on('coordinates');

            $table->foreign('fk_reg_id')->references('reg_id')
                ->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
