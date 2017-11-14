<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('rat_id');
            $table->tinyInteger('rat_value');
            $table->unsignedInteger('fk_acc_id');
            $table->unsignedInteger('fk_adv_id');
            $table->timestamps();

            $table->foreign('fk_acc_id')->references('acc_id')
                ->on('accounts');

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
        Schema::dropIfExists('rates');
    }
}
