<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('/');

Route::get('/categories', 'CategoryController@category')->name('category');
Route::get('/categories/{id}', 'CategoryController@detail')->name('category-details');

Route::get('/details/{id}', 'DetailController@detail')->name('detail');
Route::post('/details/{id}', 'DetailController@cart')->name('add-cart');

Route::post('/checkout', 'CheckoutController@process')->name('checkout');
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::group(['middleware' => ['auth']], function() {
   Route::get('/my-carts', 'CartController@cart')->name('cart');
   Route::delete('/my-carts/{id}', 'CartController@delete')->name('cart-delete');
   Route::post('/checkout-success', 'CartController@success')->name('checkout-success');

   Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

   Route::get('/dashboard/my-products', 'DashboardController@my_product')->name('my-product');
   Route::get('/dashboard/my-products/create', 'DashboardController@create')->name('product-create');
   Route::post('/dashboard/my-products/store', 'DashboardController@store')->name('product-store');   
   Route::get('/dashboard/my-products/details/{id}', 'DashboardController@detail')->name('product-detail');
   Route::post('/dashboard/my-products/details/{id}', 'DashboardController@update')->name('product-update');
   Route::post('/dashboard/my-products/gallery/upload', 'DashboardController@upload')->name('product-upload');
   Route::get('/dashboard/my-products/gallery/delete/{id}', 'DashboardController@delete')->name('product-delete');

   Route::get('/dashboard/transactions', 'DashboardController@transaction')->name('transaction');
   Route::get('/dashboard/transaction-details/{id}', 'DashboardController@transaction_detail')->name('transaction-detail');
   Route::post('/dashboard/transaction-details/{id}', 'DashboardController@transaction_update')->name('transaction-update');

   Route::get('/dashboard/my-account', 'DashboardController@account')->name('account');
   Route::get('/dashboard/settings', 'DashboardController@setting')->name('setting');
   Route::post('/dashboard/my-account/{redirect}', 'DashboardController@update_account')->name('account-redirect');
});

Route::prefix('admin')
   ->namespace('Admin')
   ->middleware(['auth', 'admin'])  
   ->group(function() {
      Route::get('/', 'DashboardAdminController@admin')->name('dashboard-admin');
      Route::resource('/banners', 'BannerController');
      Route::resource('/users', 'UserController');
      Route::resource('/categories', 'CategoryController');
      Route::resource('/products', 'ProductController');
      Route::resource('/product-galleries', 'ProductGalleryController');
      Route::resource('/transactions', 'TransactionController');
   });
      
Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Auth::routes();