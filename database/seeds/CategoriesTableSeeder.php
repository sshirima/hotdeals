<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0;$i<50;$i++){
            $this->insertCategory($faker,'Product');
        }

        for($i=0;$i<20;$i++){
            $this->insertCategory($faker,'Service');
        }
    }

    private function insertCategory($faker, $advertType){
        DB::table('categories')->insert([
            'cat_name'=> $faker->word(),
            'cat_type'=> $advertType
        ]);
    }
}
