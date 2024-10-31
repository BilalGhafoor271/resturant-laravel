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
use App\Http\Middleware\adminmiddleware;



use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/menu', [menucontroller::class, 'index'])->name('menu');
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
    return view('shop.shop_cart');
})->name('shop_cart');
Route::get('/login', function () {
    return view('userauth.login');
})->name('login');
Route::get('/signup', function () {
    return view('userauth.signup');
})->name('signup');
Route::get('/success', function () {
    return view('success');
})->name('success');
Route::get('admin', function () {
    return view('adminpanel.adminlogin');
})->name('admin');


route::fallback(function(){
    return view('404');
});

route::resource('user', userscontroller::class);
route::get('logout', [userscontroller::class,'logout'])->name('user.logout');
route::post('login', [userscontroller::class,'login'])->name('user.login');

//admin-panel route



Route::middleware(adminmiddleware::class)->group(function () {
    Route::get('/admindashbaord', function () {
        return view('adminpanel.admin-index');
    })->name('admin-dashboard');
    Route::resource('categories', categoriescontroller::class);
    Route::resource('subcategories', subcategoriescontroller::class);
    Route::resource('products', productcontroller::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
