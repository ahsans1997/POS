<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('productcategory', ProductCategoryController::class);
