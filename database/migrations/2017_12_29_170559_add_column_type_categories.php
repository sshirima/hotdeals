<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTypeCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->enum('cat_type', ['Product', 'Service'])->nullable();
        });
        //Add default Service categories
        /*DB::table('categories')->insert(array('cat_name' => 'Beauty & Spas', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Food & Drink', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Health & Fitness ', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Home Services', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Food & wine delivery', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Online learning', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Personal Services ', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Retail ', 'cat_type' => 'Service'));
        DB::table('categories')->insert(array('cat_name' => 'Things To Do', 'cat_type' => 'Service'));

        //Add default Products categories
        DB::table('categories')->insert(array('cat_name' => 'Automotive', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Home appliance', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Home improvement', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Patio & Garden', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Baby care', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Badding & bath', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Book, Music & movies', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Boys Fashion ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Furniture & Décor', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Girls Fashion ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Health & Safety ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Maternity ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Toys ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Coins & Paper Money ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Collectible Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Entertainment ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Historical & Political ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Sports ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Stamps ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Camera, Video & Surveillance ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Car Electronics & GPS ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Cell Phones & Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Computers & Tablets ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Musical Instruments ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Office Electronics & Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Portable Audio ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Software ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Television & Home Theater ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Video Games ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Wearable Technology ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Books ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Magazines ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Movies & TV ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Music ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Novelty Games & Gifts ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Video Games ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Art ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Bath ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Bedding ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Floor Care & Cleaning ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Furniture ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Heating & Cooling ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Home Appliances ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Home Décor ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Kitchen & Dining ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Luggage ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Mattresses & Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Office & School Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Patio & Garden ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Storage & Organization ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Alcohol ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Beverages ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Candy & Sweets ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Food ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Household Essentials ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Tobacco ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Bath & Body ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Cosmetics ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Fragrance ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Hair Care ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Health Care ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Men\'s Health & Beauty ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Mobility & Safety ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Oral Care ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Personal Care ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Shaving & Grooming ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Skin Care ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Vitamins & Supplements ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Children\'s Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Diamond Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Fashion Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Fine Metal Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Gemstone & Pearl Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Jewelry Accessories & Storage ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Men\'s Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Watches ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Clothing ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Shoes ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Baby & Kids ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Jewelry ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Kitchen Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Novelty Items ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Photo Prints ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Personalized Bags ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Clothing & Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Home Decor ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Stationery ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Photo Books ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Bird Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Cat Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Dog Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Fish Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Reptile & Amphibian Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Small Animal Supplies ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Clothing & Shoes ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Cycling ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Exercise & Fitness ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Fan Shop ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Golf ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Outdoors ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Recreation ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Team Sports ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Intimates ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Maternity Clothing ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Plus Size Clothing ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Accessories ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Clothing ', 'cat_type' => 'Product'));
        DB::table('categories')->insert(array('cat_name' => 'Shoes ', 'cat_type' => 'Product'));*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('cat_type');
        });
    }
}
