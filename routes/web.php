<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

    Route::prefix('admin')->group(function (){
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
        Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

        Route::get('/categories', 'Admin\CategoryController@show')->name('categories');
        Route::post('/categories', 'Admin\CategoryController@addCategories')->name('addCategories');
        Route::get('/products', 'Admin\ProductController@show')->name('products');
        Route::post('/products', 'Admin\ProductController@addProducts')->name('addProducts');
        Route::get('/product/{id}', 'Admin\ProductController@showProduct');
        Route::post('/product-by-category', 'Admin\ProductController@showProductsByCategory')->name('showProductsByCategory');
    });
