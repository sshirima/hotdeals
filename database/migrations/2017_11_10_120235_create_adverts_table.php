<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('adv_id');
            $table->string('adv_title', 255);
            $table->text('adv_description');
            $table->boolean('adv_approved');
            $table->dateTime('adv_expiredate');
            $table->dateTime('adv_approveddate')->nullable();
            $table->unsignedInteger('fk_slr_id');
            $table->timestamps();

            $table->foreign('fk_slr_id')->references('slr_id')
                ->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
