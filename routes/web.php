<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


/**
 * Login Routes
 */
Auth::routes();

/**
 * Home Route
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Account Routes
 */
Route::get('/account', 'UserController@index')->name('account.index');

/**
 * Recipe Routes
 */
Route::get('/recipes/latest', 'RecipeController@latestRecipes')->name('recipes.latest');
Route::get('/recipes/category/{id}', 'RecipeController@categorized')->name('recipes.categorized');
Route::get('/recipes/search', 'RecipeController@search')->name('recipe.search');
Route::resource('/recipes', RecipeController::class);

/**
 * Category Routes
 */
Route::resource('/categories', CategoryController::class);

