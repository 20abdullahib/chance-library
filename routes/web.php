<?php

use App\Http\Controllers\ChanceWebsite\HomePageController;
use App\Http\Controllers\ChanceWebsite\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ***********  Chance Website  *************

// *****  Home Main Page   *****

Route::get('/', [HomePageController::class, 'index']);

Route::resource('Home', HomePageController::class);


// *****  Search Pages   *****

Route::get('search', [SearchController::class, 'display'])->name('search');

Route::match(['get', 'post'], '/search/result', [SearchController::class, 'search_result'])->name('search.result');

Route::get('search/filter/{filter}/{filterID}', [SearchController::class, 'search_result_filterID'])
    ->name('search.result.filterID');

Route::get('search/result/filter/{filter}/{value}', [SearchController::class, 'search_result_All'])
    ->name('search.result.filter.all');


Auth::routes();

Auth::routes();

