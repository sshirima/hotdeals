<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('srv_id');
            $table->string('srv_name', 50);
            $table->string('srv_brand', 50);
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
        Schema::drop('services');
    }
}
