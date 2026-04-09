<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Catalog;

Route::get('/', function () {
    $categories = Category::all();
    $catalogs = Catalog::with('category')->get();
    return view('welcome', compact('categories', 'catalogs'));
});
