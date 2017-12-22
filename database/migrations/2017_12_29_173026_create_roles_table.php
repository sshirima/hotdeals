<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('rol_id');
            $table->string('rol_name');
            $table->string('rol_description')->nullable();
        });
        \Illuminate\Support\Facades\DB::table('roles')->insert(array('rol_name' => 'Administrators', 'rol_description' => 'System admins'));
        \Illuminate\Support\Facades\DB::table('roles')->insert(array('rol_name' => 'Authorizers', 'rol_description' => 'Advert authorise users'));
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
