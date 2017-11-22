<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('img_id');
            $table->string('img_path');
            $table->string('img_name', 50);
            $table->string('img_width', 10);
            $table->string('img_height', 10);
            $table->unsignedInteger('fk_itm_id');
            $table->timestamps();

            $table->foreign('fk_itm_id')->references('itm_id')
                ->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
