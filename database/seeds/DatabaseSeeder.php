<?php

use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::Statement('SET FOREIGN_KEY_CHECKS = 0');

    	User::truncate();
    	Category::truncate();
    	Product::truncate();
    	Transaction::truncate();
    	DB::table('category_product')->truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();

    	$this->call(UsersTableSeeder::class);
    	$this->call(CategoriesTableSeeder::class);
    	$this->call(ProductsTableSeeder::class);
    	$this->call(TransactionsTableSeeder::class);
    }
}
