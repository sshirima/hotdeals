<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('com_id');
            $table->text('com_contents');
            $table->unsignedInteger('fk_adv_id');
            $table->unsignedInteger('fk_acc_id');
            $table->timestamps();

            $table->foreign('fk_adv_id')->references('adv_id')
                ->on('adverts');

            $table->foreign('fk_acc_id')->references('acc_id')
                ->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
