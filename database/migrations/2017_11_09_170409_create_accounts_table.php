<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('acc_id');
            $table->string('acc_fname');
            $table->string('acc_lname');
            $table->string('acc_email');
            $table->string('acc_password');
            $table->boolean('acc_login');
            $table->boolean('acc_active');
            $table->unsignedInteger('fk_grp_id');
            $table->timestamps();

            $table->foreign('fk_grp_id')->references('grp_id')
                ->on('accountgroups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
