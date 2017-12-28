<?php

use App\User;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\random;
use Faker\Provider\numberBetween;
use Faker\Provider\randomElement;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1,10),
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['kitten1.jpeg', 'kitten2.jpg', 'kitten3.jpg']),
        'seller_id' => User::inRandomOrder()->first(),
    ];
});
 