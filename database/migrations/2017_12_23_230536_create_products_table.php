<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('name', 50);
            $table->string('brand', 50);
            $table->string('manufacturer', 50);
            $table->string('model', 50);
            $table->unsignedinteger('p_cost');
            $table->unsignedinteger('c_cost');
            $table->integer('advert_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('advert_id')->references('id')->on('adverts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
