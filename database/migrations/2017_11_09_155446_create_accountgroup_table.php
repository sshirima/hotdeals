<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountgroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountgroups', function (Blueprint $table) {
            $table->increments('grp_id');
            $table->string('grp_name');
            $table->string('grp_description')->nullable();
            $table->unsignedInteger('grp_level')->default(0);
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('accountgroups')->insert(array('grp_name' => 'Administrators', 'grp_description' => 'Group for system admins', 'grp_level' => \App\AccountGroup::$DEFAULT_LEVEL_ADMIN));
        \Illuminate\Support\Facades\DB::table('accountgroups')->insert(array('grp_name' => 'Sellers', 'grp_description' => 'Group for adverts sellers', 'grp_level' => \App\AccountGroup::$DEFAULT_LEVEL_SELLER));
        \Illuminate\Support\Facades\DB::table('accountgroups')->insert(array('grp_name' => 'Authorizers', 'grp_description' => 'Group for adverts authorizers', 'grp_level' => \App\AccountGroup::$DEFAULT_LEVEL_AUTHORIZER));
        \Illuminate\Support\Facades\DB::table('accountgroups')->insert(array('grp_name' => 'OnlineUsers', 'grp_description' => 'Group for online users', 'grp_level' => \App\AccountGroup::$DEFAULT_LEVEL_ONLINE_USER));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountgroups');
    }
}
