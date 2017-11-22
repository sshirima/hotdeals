<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAdvertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->dropColumn('adv_expiredate');
            $table->dropColumn('adv_approveddate');

        });
        Schema::table('adverts', function (Blueprint $table) {
            $table->date('adv_expiredate')->after('adv_approved');
            $table->date('adv_approveddate')->after('adv_expiredate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->dropColumn('adv_expiredate');
            $table->dropColumn('adv_approveddate');
        });
        Schema::table('adverts', function (Blueprint $table) {

            $table->dateTime('adv_expiredate')->after('adv_approved');;
            $table->dateTime('adv_approveddate')->after('adv_expiredate')->nullable();
        });
    }
}
