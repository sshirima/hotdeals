<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        //Create product advert faker data
        $productCats = $this->getCategories('Product');
        $admins = $this->getAdmins();
        $sellers = $this->getSellers();
        $users = $this->getUsers();

        for($i=0;$i<100;$i++){
            $advertId = $this->insertAdvert($faker,'Product', $admins[rand(0, (sizeOf($admins)-1))]->email,
                $sellers[rand(0, (sizeOf($sellers)-1))]->id);

            $this->insertLocation($faker, $advertId);
            $this->insertProduct($faker, $advertId);
            for($j=0;$j<3;$j++){
                $this->insertImage($faker, $advertId);
            }

            $this->insertAdvertCategory($advertId, $productCats[rand(0,(sizeOf($productCats)-1))]->id);

            for($j=0;$j<rand(2, 5);$j++){
                $this->insertRates($advertId, $users[rand(0, (sizeOf($users)-1))]->id);
            }

            for($j=0;$j<rand(1, 5);$j++){
                $this->insertComments($faker,$advertId,$users[rand(0, (sizeOf($users)-1))]->id);
            }
        }

        $serviceCats = $this->getCategories('Service');
        for($i=0;$i<70;$i++){
            $advertId = $this->insertAdvert($faker,'Service', $admins[rand(0, (sizeOf($admins)-1))]->email,
                $sellers[rand(0, (sizeOf($sellers)-1))]->id);

            $this->insertLocation($faker, $advertId);
            $this->insertService($faker, $advertId);
            for($j=0;$j<rand(1, 3);$j++){
                $this->insertImage($faker, $advertId);
            }
            $this->insertAdvertCategory($advertId, $serviceCats[rand(0,(sizeOf($serviceCats)-1))]->id);

            for($j=0;$j<rand(2, 20);$j++){
                $this->insertRates( $advertId,$users[rand(0, (sizeOf($users)-1))]->id);
            }

            for($j=0;$j<rand(1, 5);$j++){
                $this->insertComments($faker,$advertId,$users[rand(0, (sizeOf($users)-1))]->id);
            }
        }
    }

    private function getCategories($catType){
       return DB::table('categories')->select('id')->where(['cat_type'=>$catType])->get();
    }

    private function getAdmins(){
        return DB::table('admins')->select('email')->get();
    }

    private function getUsers(){
        return DB::table('users')->select('id')->get();
    }

    private function getSellers(){
        return DB::table('sellers')->select('id')->get();
    }

    private function insertRates($advertId, $userId){
        DB::table('rates')->insert([
            'value'=>rand(1,5),
            'advert_id'=>$advertId,
            'user_id'=>$userId
        ]);
    }

    private function insertComments($faker, $advertId, $userId){
        DB::table('comments')->insert([
            'com_contents'=>$faker->realText(100, 2),
            'advert_id'=>$advertId,
            'user_id'=>$userId
        ]);
    }

    private function insertAdvert($faker, $advertType, $adminEmail, $sellerId){
        if($faker->boolean($chanceOfGettingTrue = 80)){
            $approved = true;
            $approvedBy = $adminEmail;
        }else{
            $approved = false;
            $approvedBy = null;
        }
        return DB::table('adverts')->insertGetId([
            'title' => $faker->sentence(8, true),
            'description' => $faker->paragraphs(rand(2,5), true),
            'expiredate' => $faker->date('Y-m-d','1514764799'),
            'approved' => $approved,
            'approved_by' => $approvedBy,
            'seller_id' => $sellerId,
            'adv_type' =>  $advertType
        ]);
    }

    private function insertLocation($faker, $advertId){
        return DB::table('locations')->insert([
            'advert_id' => $advertId,
            'region_id' => rand(1,22),
        ]);
    }

    private function insertImage($faker, $advertId){
        return DB::table('images')->insert([
            'advert_id' => $advertId,
            'img_name' => $faker->imageUrl(900,600)
        ]);
    }

    private function insertProduct($faker, $advertId){
        DB::table('products')->insert([
            'name' => $faker->word(),
            'brand' => $faker->word(),
            'manufacturer' => $faker->word(),
            'model' => $faker->word(),
            'p_cost' => $faker->numberBetween($min = 10000, $max = 100000),
            'c_cost' => $faker->numberBetween($min = 1000, $max = 10000),
            'advert_id' => $advertId
        ]);
    }

    private function insertService($faker, $advertId){
        DB::table('services')->insert([
            'srv_name' => $faker->word(),
            'srv_brand' => $faker->word(),
            'p_cost' => $faker->numberBetween($min = 10000, $max = 100000),
            'c_cost' => $faker->numberBetween($min = 1000, $max = 10000),
            'advert_id' => $advertId
        ]);
    }

    private function insertAdvertCategory($advertId, $categoryId){
       DB::table('advert_category')->insert([
           'category_id'=>$categoryId,
           'advert_id'=>$advertId,
       ]);
    }
}
