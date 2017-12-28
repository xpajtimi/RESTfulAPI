<?php

use App\User;
use App\Seller;
use App\Transaction;
use Faker\Generator as Faker;
use Illuminate\Support\random;
use Faker\Provider\numberBetween;

$factory->define(Transaction::class, function (Faker $faker) {
    
        $seller = Seller::has('products')->get()->random();
        $buyer = User::all()->except($seller->id)->random();

	return [
		'quantity' => $faker->numberBetween(1,3),
		'buyer_id' => $buyer->id,
		'product_id' => $seller->products()->inRandomOrder()->first(),
    ];
});
