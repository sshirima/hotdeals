<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Seller::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
        'phonenumber' => $faker->phoneNumber(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'cat_name' => $faker->word()
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Advert::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'description' => $faker->paragraphs(rand(2,5), true),
        'expiredate' => $faker->date('1514764799'),
        'approved' => $faker->boolean($chanceOfGettingTrue = 80),
        'approved_by' => function () {
            return \App\Admin::find(rand(1,20))->email;
        },
        'seller_id' => $faker->numberBetween($min = 1, $max = 49),
        'adv_type' =>  'Product'
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
        'brand' => $faker->word(),
        'manufacturer' => $faker->word(),
        'model' => $faker->word(),
        'p_cost' => $faker->numberBetween($min = 10000, $max = 100000),
        'c_cost' => $faker->numberBetween($min = 1000, $max = 10000),
        'advert_id' => function () {
            return factory(App\Models\Advert::class)->create()->each(
                function ($advert){

                }
            )->id;
        }
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'srv_name' => $faker->word(),
        'srv_brand' => $faker->word(),
        'p_cost' => $faker->numberBetween($min = 10000, $max = 100000),
        'c_cost' => $faker->numberBetween($min = 1000, $max = 10000),
        'advert_id' => function () {
            return factory(App\Models\Advert::class)->create()->id;
        }
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Image::class, function (Faker\Generator $faker) {
    return [
        'img_name' => $faker->imageUrl(640, 480),
        'advert_id' => function($adv){
        return $adv->id;
        },
    ];
});

