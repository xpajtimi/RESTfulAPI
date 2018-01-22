<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('test')->post('username', 'Test\TestController@store');
Route::name('test')->get('usernames', 'Test\TestController@index');

//Buyers 
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
	//Get transactions for a buyer. For example: url\buyer\{id}\transactions
	Route::resource('buyer.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);
	//Get products for a buyer. For example: url\buyer\{id}\products
	Route::resource('buyer.products', 'Buyer\BuyerProductController', ['only' => ['index']]);
	//Get sellers of the products that a buyer buys. For example: url\buyer\{id}\sellers
	Route::resource('buyer.sellers', 'Buyer\BuyerSellerController', ['only' => ['index']]);
	//Get categories of the products that a buyer buys. For example: url\buyer\{id}\categories
	Route::resource('buyer.categories', 'Buyer\BuyerCategoryController', ['only' => ['index']]);
//Sellers
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);
	//Get transactions of the products that a seller sells. For example: url\seller\{id}\transactions
	Route::resource('seller.transactions', 'Seller\SellerTransactionController', ['only' => ['index']]);
	//Get categories of the products that a seller sells. For example: url\seller\{id}\categories
	Route::resource('seller.categories', 'Seller\SellerCategoryController', ['only' => ['index']]);
	//Get buyers of the products that a seller sells. For example: url\seller\{id}\buyers
	Route::resource('seller.buyers', 'Seller\SellerBuyerController', ['only' => ['index']]);
	//Get products that a seller sells. For example: url\seller\{id}\products
	Route::resource('seller.products', 'Seller\SellerProductController', ['except' => ['create', 'show', 'edit']]);


//Categories
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);
	////Get products for a specific category. For example: url\category\{id}\products
	Route::resource('category.products', 'Category\CategoryProductController', ['only' => ['index']]);
	////Get sellers for a specific category. For example: url\category\{id}\sellers
	Route::resource('category.sellers', 'Category\CategorySellerController', ['only' => ['index']]);
	////Get transactions for a specific category. For example: url\category\{id}\transactions
	Route::resource('category.transactions', 'Category\CategoryTransactionController', ['only' => ['index']]);
	////Get buyers for a specific category. For example: url\category\{id}\buyers
	Route::resource('category.buyers', 'Category\CategoryBuyerController', ['only' => ['index']]);

//Products
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
	////Get transactions for a specific product. For example: url\product\{id}\transactions
	Route::resource('product.transactions', 'Product\ProductTransactionController', ['only' => ['index']]);
	////Get buyers for a specific product. For example: url\product\{id}\buyers
	Route::resource('product.buyers', 'Product\ProductBuyerController', ['only' => ['index']]);
	////Get categories for a specific product. For example: url\product\{id}\categories
	Route::resource('product.categories', 'Product\ProductCategoryController', ['only' => ['index', 'update', 'destroy']]);
	////Store transactions of a buyer for a specific product. For example: url\product\{id}\buyers\{id}\transactions
	Route::resource('product.buyers.transactions', 'Product\ProductBuyerTransactionController', ['only' => ['store']]);

//Transactions
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);
	//Get categories for a specific transaction. For example: url\transactions\{id}\categories
	Route::resource('transaction.categories', 'Transaction\TransactionCategoryController', ['only' => ['index']]);
	//Get the seller for a specific transaction. For example: url\transactions\{id}\sellers
	Route::resource('transaction.seller', 'Transaction\TransactionSellerController', ['only' => ['index']]);

//Users
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);

//verify users route
Route::name('verify')->get('users/verify/{token}' , 'User\UserController@verify');
//resend verify users route
Route::name('resend')->get('users/{user}/resend' , 'User\UserController@resend');

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
