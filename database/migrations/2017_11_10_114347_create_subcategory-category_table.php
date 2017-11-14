<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_category', function (Blueprint $table) {
            $table->unsignedInteger('fk_cat_id');
            $table->unsignedInteger('fk_subcat_id');

            $table->foreign('fk_cat_id')->references('cat_id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('fk_subcat_id')->references('subcat_id')
                ->on('subcategories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_category');
    }
}
