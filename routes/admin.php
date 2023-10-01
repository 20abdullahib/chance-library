<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ChanceWebsite\HomePageController;
use App\Http\Controllers\ChanceWebsite\LoginController;
use App\Http\Controllers\Dashboard\MaterialSubjectController;
use App\Http\Controllers\ChanceWebsite\SearchController;
use App\Http\Controllers\Dashboard\SubjectsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => 'auth:admin'], function () {
    // *********** Dashboard *************

    // ***** Admin *****
    Route::resource('dashboard/admin', DashboardController::class);

    Route::get('dashboard/show', [DashboardController::class, 'show'])->name('dashboard.show-admins');

    // ***** Subject *****

    Route::resource('dashboard/subject', SubjectsController::class);

    Route::post('dashboard/subject/search', [SubjectsController::class, 'search'])->name('subject.search');

    // ***** Material Subject *****

    Route::resource('subject/material', MaterialSubjectController::class);
});


// *****  Login Page   *****
Route::get('admin/login', [LoginController::class, 'login'])->name('admin.dashboard.login');

Route::post('admin/login', [LoginController::class, 'checklogin'])->name('admin.dashboard.checklogin');

Route::get('logout', [LoginController::class, 'logout'])->name('admin.dashboard.logout');
