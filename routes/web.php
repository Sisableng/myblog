<?php

use App\Http\Middleware\Localization;
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

Route::get("/localization/{language}", [
    App\Http\Controllers\LocalizationController::class,
    "switch",
])->name("localization.switch");

Route::get("/", function () {
    return view("welcome");
});

Auth::routes([
    "register" => false,
]);

Route::middleware(["auth"])->group(function () {
    Route::get("/home", [
        App\Http\Controllers\HomeController::class,
        "index",
    ])->name("home");

    // Categories
    Route::get("/categories/select", [
        \App\Http\Controllers\CategoryController::class,
        "select",
    ])->name("categories.select");
    Route::resource(
        "/categories",
        \App\Http\Controllers\CategoryController::class
    );

    // Tags
    Route::get("/tags/select", [
        \App\Http\Controllers\TagController::class,
        "select",
    ])->name("tags.select");
    Route::resource(
        "/tags",
        \App\Http\Controllers\TagController::class
    )->except(['show']);

    // Posts
    Route::resource("/posts", \App\Http\Controllers\PostController::class);

    // Filemanager
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index', [\App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    // Roles
    Route::get("/roles/select", [
        \App\Http\Controllers\RoleController::class,
        "select",
    ])->name("roles.select");
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);

    // Users
    Route::resource('/users', \App\Http\Controllers\UserController::class);
});
