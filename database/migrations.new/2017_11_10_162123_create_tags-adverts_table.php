<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_adverts', function (Blueprint $table) {
            $table->unsignedInteger('fk_tag_id');
            $table->unsignedInteger('fk_adv_id');
            $table->timestamps();

            $table->foreign('fk_tag_id')->references('tag_id')
                ->on('tags');

            $table->foreign('fk_adv_id')->references('adv_id')
                ->on('adverts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_adverts');
    }
}
