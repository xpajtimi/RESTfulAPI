<?php

use App\Product;
use App\Category;
use Illuminate\Support\random;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsQuantity = 1000;

        factory(Product::class, $productsQuantity)->create()
        				->each(function($product){

        					$categories = Category::all()->random(mt_rand(1,5))
        						->pluck('id');
        					$product->categories()->attach($categories);
        				});
    }
}
