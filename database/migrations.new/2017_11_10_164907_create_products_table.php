<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('pdc_id');
            $table->string('pdc_manufacturer', 50)->nullable();
            $table->string('pdc_model', 50)->nullable();
            $table->unsignedInteger('fk_itm_id');

            $table->foreign('fk_itm_id')->references('itm_id')
                ->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
