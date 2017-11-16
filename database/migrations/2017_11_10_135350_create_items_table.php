<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('itm_id');
            $table->string('itm_name', 50);
            $table->enum('itm_type', array('SERVICE', 'PRODUCT'));
            $table->double('itm_pcost');
            $table->double('itm_ccost');
            $table->string('itm_brand', 50);
            $table->unsignedInteger('fk_adv_id');
            $table->unsignedInteger('fk_cat_id');

            $table->foreign('fk_adv_id')->references('adv_id')
                ->on('adverts');

            $table->foreign('fk_cat_id')->references('cat_id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
