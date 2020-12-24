<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'photo' => 'backend/category/electric.jpg',
    ];
});

$factory->define(App\Subcategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'photo' => 'backend/brand/*',
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'codeno' => $faker->numberBetween($min = 100, $max = 110),
        'photo' => 'backend/item/*',
        'price' => $faker->numberBetween($min = 1000, $max = 50000),
        'discount' => $faker->numberBetween($min = 5000, $max = 40000),
        'description' => $faker->text,
        'brand_id' => $faker->numberBetween($min = 1, $max = 5),
        'subcategory_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});


$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'codeno' => $faker->numberBetween($min = 100, $max = 110),
        'orderdate' => $faker->date,
        'total' => $faker->numberBetween($min = 5000, $max = 500000),
        'status' => $faker-> numberBetween($min = 0, $max = 1),
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

