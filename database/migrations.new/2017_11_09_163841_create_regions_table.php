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
            $table->increments('reg_id');
            $table->string('reg_name');
        });

        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Kagera'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Mwanza'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Mara'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Shinganga'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Tabora'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Kigoma'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Rukwa'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Mbeya'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Iringa'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Dodoma'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Singida'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Arusha'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Kilimanjaro'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Tanga'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Morogoro'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Ruvuma'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Dar es salaam'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Mtwara'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Pwani'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Lindi'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Simuyu'));
        \Illuminate\Support\Facades\DB::table('regions')->insert(array('reg_name' => 'Manyara'));
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
