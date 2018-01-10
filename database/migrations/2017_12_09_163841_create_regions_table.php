<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_name');
            $table->index(['reg_name']);
        });

        DB::table('regions')->insert(array('reg_name' => 'Arusha',));
        DB::table('regions')->insert(array('reg_name' => 'Kilimanjaro',));
        DB::table('regions')->insert(array('reg_name' => 'Tanga',));
        DB::table('regions')->insert(array('reg_name' => 'Morogoro',));
        DB::table('regions')->insert(array('reg_name' => 'Ruvuma',));
        DB::table('regions')->insert(array('reg_name' => 'Kagera',));
        DB::table('regions')->insert(array('reg_name' => 'Mwanza',));
        DB::table('regions')->insert(array('reg_name' => 'Mwanza',));
        DB::table('regions')->insert(array('reg_name' => 'Mara',));
        DB::table('regions')->insert(array('reg_name' => 'Shinyanga',));
        DB::table('regions')->insert(array('reg_name' => 'Tabora',));
        DB::table('regions')->insert(array('reg_name' => 'Kigoma',));
        DB::table('regions')->insert(array('reg_name' => 'Rukwa',));
        DB::table('regions')->insert(array('reg_name' => 'Mbeya',));
        DB::table('regions')->insert(array('reg_name' => 'Iringa',));
        DB::table('regions')->insert(array('reg_name' => 'Dodoma',));
        DB::table('regions')->insert(array('reg_name' => 'Singida',));
        DB::table('regions')->insert(array('reg_name' => 'Dar es Salaam',));
        DB::table('regions')->insert(array('reg_name' => 'Mtwara',));
        DB::table('regions')->insert(array('reg_name' => 'Pwani',));
        DB::table('regions')->insert(array('reg_name' => 'Lindi',));
        DB::table('regions')->insert(array('reg_name' => 'Manyara',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
