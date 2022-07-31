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

// Route::get("/", function () {
//     return view("welcome");
// });

Route::get(
    '/',
    [\App\Http\Controllers\BlogController::class, 'home']
)->name('blog.home');

Route::get(
    '/post/{slug}',
    [\App\Http\Controllers\BlogController::class, 'showPostsDetail']
)->name('blog.posts.detail');

Route::get(
    '/category',
    [\App\Http\Controllers\BlogController::class, 'showCategories']
)->name('blog.categories');

Route::get(
    '/category/{slug}',
    [\App\Http\Controllers\BlogController::class, 'showPostsByCategory']
)->name('blog.posts.category');

Route::get(
    '/tag',
    [\App\Http\Controllers\BlogController::class, 'showTags']
)->name('blog.tags');

Route::get(
    '/tag/{slug}',
    [\App\Http\Controllers\BlogController::class, 'showPostsByTag']
)->name('blog.posts.tag');

Route::get(
    '/search',
    [\App\Http\Controllers\BlogController::class, 'searchPosts']
)->name('blog.search');

// Blog Pages
Route::get(
    '/sejarah',
    [\App\Http\Controllers\BlogController::class, 'sejarahPages']
)->name('blog.pages.sejarah');

Route::get("/pesantren", function () {
    return view("blog.pages.pesantren");
});
Route::get("/mts", function () {
    return view("blog.pages.mts");
});
Route::get("/sma", function () {
    return view("blog.pages.sma");
});
Route::get("/badan-otonom", function () {
    return view("blog.pages.badan-otonom");
});
Route::get("/contact", function () {
    return view("blog.pages.contact");
});

Auth::routes([
    "register" => false,
    "reset" => true,
]);

// Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
//     Route::get("/", [
//         App\Http\Controllers\DashboardController::class,
//         "index",
//     ])->name("dashboard.index");
// });

Route::middleware(["auth"])->group(function () {

    Route::get('/admin', function () {
        return redirect('/dashboard');
    });

    Route::get("/dashboard", [
        App\Http\Controllers\DashboardController::class,
        "index",
    ])->name("dashboard.index");

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
    Route::resource('/users', \App\Http\Controllers\UserController::class)->except(['show']);

    // Settings
    Route::get('/settings/general', function () {
        $title = 'General';
        return view('settings.index', [
            'title' => $title
        ]);
    });
});
