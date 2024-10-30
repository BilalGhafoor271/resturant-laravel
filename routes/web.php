<?php

use App\Http\Controllers\categoriescontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\subcategoriescontroller;
use App\Http\Controllers\shopcontroller;
use App\Http\Controllers\userscontroller;
use App\Models\category;
use App\Models\subcategory;
use App\Models\Product;
use App\Http\Controllers\menucontroller;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/menu', [ProductController::class, 'showMenu'])->name('menu');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/shop/{id}', [shopcontroller::class, 'show'])->name('shop_detail');

Route::get('/shop_cart', function () {
    return view('shop_cart');
})->name('shop_cart');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::get('/success', function () {
    return view('success');
})->name('success');
Route::get('adminlogin', function () {
    return view('adminpanel/adminlogin');
})->name('adminlogin');


route::fallback(function(){
    return view('404');
});

route::resource('user', userscontroller::class);
route::get('logout', [userscontroller::class,'logout'])->name('user.logout');
route::post('login', [userscontroller::class,'login'])->name('user.login');

//admin-panel route

    Route::get('/admin', function () {
        return view('adminpanel/admin-index');
    })->name('admin');
    Route::resource('categories', categoriescontroller::class);
    Route::resource('subcategories', subcategoriescontroller::class);
    Route::resource('products', productcontroller::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
