<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::view('/products', 'products.index')->name('products.index');
Route::view('/products/{slug}', 'products.show')->name('products.show');
Route::view('/categories', 'pages.categories')->name('categories.index');
Route::view('/sellers', 'sellers.index')->name('sellers.index');
Route::view('/sellers/{slug}', 'sellers.show')->name('sellers.show');
Route::view('/companies', 'companies.index')->name('companies.index');
Route::view('/companies/{slug}', 'companies.show')->name('companies.show');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/dashboard', 'dashboard.index')->name('dashboard');
Route::view('/seller/dashboard', 'dashboard.seller')->name('seller.dashboard');
Route::view('/admin', 'admin.index')->name('admin.index');
