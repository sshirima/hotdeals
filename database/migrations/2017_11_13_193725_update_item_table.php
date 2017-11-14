<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_fk_cat_id_foreign');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('fk_cat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedInteger('fk_cat_id');

            $table->foreign('fk_cat_id')->references('cat_id')
                ->on('categories');
        });
    }
}
