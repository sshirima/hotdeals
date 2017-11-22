<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_locations', function (Blueprint $table) {
            $table->unsignedInteger('fk_itm_id');
            $table->unsignedInteger('fk_loc_id');

            $table->foreign('fk_itm_id')->references('itm_id')
                ->on('items');

            $table->foreign('fk_loc_id')->references('loc_id')
                ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_locations');
    }
}
