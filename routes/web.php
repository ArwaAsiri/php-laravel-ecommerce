<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Dashboard;
use App\Http\controllers\Shopping;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

/*
we are gonna cancel these routes
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name ('index');

Route::get('/dashboard/products', function () {
    return view('dashboard.products');
})->name ('products');
*/

/***********Dashboard Routs*********/
Route::get('/dashboard',[Dashboard::class,'index'])->name('index');
Route::get('/dashboard/products',[Dashboard::class,'getProducts'])->name('products');
Route::get('/dashboard/search',[Dashboard::class,'getProducts'])->name('search');

Route::post('/dashboard/createproducts',[Dashboard::class,'createProducts'])->name('createproducts');
Route::get('/del{id}',[Dashboard::class,'del'])->name('del');
Route::get('/edit{id}',[Dashboard::class,'edit'])->name('edit');
Route::get('/dashboard/testView',[Dashboard::class,'testView'])->name('testView');
Route::get('/dashboard/update',[Dashboard::class,'update'])->name('update-product');
Route::get('/dashboard/showall',[Dashboard::class,'showAll'])->name('showall');
Route::get('/dashboard/getproductdetails',[Dashboard::class,'getProductDetails'])->name('product-details');
Route::post('/dashboard/createproductdetails',[Dashboard::class,'createProductDetails'])->name('create-details');
Route::get('/test',[Dashboard::class,'test'])->name('test');
Route::get('/logout',[Dashboard::class,'logout'])->name('logout');
Auth::routes();


//***************Shopping Routes*******************/
Route::get('/shopping/showitems',[Shopping::class,'ShowListItemsPhone'])->name('show-items');
Route::get('/shopping/details/{id}',[Shopping::class,'ShowDetailsPhone'])->name('show-items-details');
Route::get('/shopping/Add_to_cart/{id}',[Shopping::class,'Add_to_cart'])->name('add-to-cart');
Route::get('/shopping/cart',[Shopping::class,'showCart'])->name('ShowCart');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');