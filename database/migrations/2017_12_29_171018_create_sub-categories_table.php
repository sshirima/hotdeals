<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('subcat_id');
            $table->string('subcat_name', 50);
        });
        DB::table('subcategories')->insert(array('subcat_name' => 'Car Audio'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Car Care'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Car Electronics'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Car Safety & Security'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Car Video'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Exterior Accessories'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Cars'));
        DB::table('subcategories')->insert(array('subcat_name' => 'GPS'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Interior Accessories'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Motorsports'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Radar Detectors'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Replacement Parts'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Freezers '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Irons & Garment Care '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Microwaves '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Refrigerators '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Sewing Machines '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Stoves & Ranges '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Dishwashers '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Vacuums & Floor Care '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Washers & Dryers '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Wine Coolers '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Bathroom Faucets '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Batteries '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Electrical '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Flooring '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Garage '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Hand Tools '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Hardware '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Heating & Cooling '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Home Safety & Security '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Kitchen & Bath Fixtures '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Paint & Wallpapers '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Plumbing '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Power Tools '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Tool Storage '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Shower Heads '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Lighting '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Fire Pits & Outdoor Heaters '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Outdoor Décor '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Grills & Accessories '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Outdoor Storage '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Plants, Seeds & Bulbs '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Gardening & Lawn Care '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Outdoor Power Equipment '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Pools & Water Fun '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Baby Gear '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Baby Feeding '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Baby Diapering '));

        DB::table('subcategories')->insert(array('subcat_name' => 'Auto Repair & Maintenance'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Transportation'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Auto Cleaning '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Parking'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Salons '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Face & Skin '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Hair'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Massages'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Cosmetic Procedures'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Hair Removal '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Brows & Lashes'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Nails '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Spas '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Blowouts & Styling '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Tanning '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Makeup '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Restaurants '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Groceries & Markets '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Cafes & Treats '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Breweries, Wineries & Distilleries'));
        DB::table('subcategories')->insert(array('subcat_name' => 'Bars '));
        DB::table('subcategories')->insert(array('subcat_name' => 'Gyms '));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
