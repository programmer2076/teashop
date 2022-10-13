<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::group(['prefix'=>'backend', 'namespace'=>'Backend' ,'middleware'=>['manager', 'auth', 'verified']],function(){
//     Route::get('/', [BaseController::class, 'index'])->name('backend');

//     Route::get('/users', [UserController::class, 'index'])->name('user');
//     Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
//     Route::post('/users/edit/{user}', [UserController::class, 'update'])->name('user.update');
//     Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
//     Route::get('/users/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

//     Route::get('/roles', [RoleController::class, 'index'])->name('role');
//     Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
//     Route::post('/roles/create', [RoleController::class, 'store'])->name('role.store');
//     Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
//     Route::post('/roles/edit/{role}', [RoleController::class, 'update'])->name('role.update');
//     Route::get('/roles/delete/{role}', [RoleController::class, 'delete'])->name('role.delete');
//     Route::get('/roles/destroy/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

// });
Route::group(['namespace'=>'App\Http\Controllers', 'middleware'=>['auth']], function(){
    // Route::get('/table', ['uses' => 'DeskController@index'])->name('table');
    // Route::get('/table/create', ['uses' => 'DeskController@create'])->name('table.create');
    Route::post('/tables/select', ['uses' => 'TableController@store'])->name('table.store');
    Route::get('/tables/edit/{desk}', ['uses' => 'TableController@edit'])->name('table.edit');
    Route::post('/tables/edit/{desk}', ['uses' => 'TableController@update'])->name('table.update');


    Route::get('/checkouts', ['uses' => 'MenuController@checkout'])->name('checkout');
    Route::get('/checkouts/report', ['uses' => 'MenuController@create'])->name('report');
    

    Route::get('/menus', ['uses' => 'MenuController@index'])->name('f.menu');
    Route::get('/menus/order', ['uses' => 'MenuController@order'])->name('order');
    Route::post('/menus/order', ['uses' => 'MenuController@store'])->name('order.store');


    
    // The menu bulk for test
    Route::get('/menus/bulk', ['uses' => 'MenuController@bulk'])->name('f.menu.bulk');

    Route::get('/categories', ['uses' => 'CategoryController@index'])->name('f.categories');

});



Route::group(['prefix'=>'admin', 'namespace'=>'App\Http\Controllers\Backend', 'middleware'=>['manager', 'auth',]], function(){
    Route::get('/', ['uses' => 'DashController@index'])->name('dash');

    Route::get('/users', ['uses' => 'UserController@index'])->name('user');

    Route::get('/users', ['uses' => 'UserController@index'])->name('user');
    Route::get('/users/edit/{user}', ['uses' => 'UserController@edit'])->name('user.edit');
    Route::post('/users/edit/{user}', ['uses' => 'UserController@update'])->name('user.update');
    Route::get('/users/delete/{user}', ['uses' => 'UserController@delete'])->name('user.delete');
    Route::get('/users/destroy/{user}', ['uses' => 'UserController@destroy'])->name('user.destroy');

    Route::get('/roles', ['uses' => 'RoleController@index'])->name('role');
    Route::get('/roles/create', ['uses' => 'RoleController@create'])->name('role.create');
    Route::post('/roles/create', ['uses' => 'RoleController@store'])->name('role.store');
    Route::get('/roles/edit/{role}', ['uses' => 'RoleController@edit'])->name('role.edit');
    Route::post('/roles/edit/{role}', ['uses' => 'RoleController@update'])->name('role.update');
    Route::get('/roles/delete/{role}', ['uses' => 'RoleController@delete'])->name('role.delete');
    Route::get('/roles/destroy/{role}', ['uses' => 'RoleController@destroy'])->name('role.destroy');


    Route::get('/desks', ['uses' => 'DeskController@index'])->name('desk');
    Route::get('/desks/create', ['uses' => 'DeskController@create'])->name('desk.create');
    Route::post('/desks/create', ['uses' => 'DeskController@store'])->name('desk.store');
    Route::get('/desks/edit/{desk}', ['uses' => 'DeskController@edit'])->name('desk.edit');
    Route::post('/desks/edit/{desk}', ['uses' => 'DeskController@update'])->name('desk.update');

    Route::get('/categories', ['uses' => 'CategoryController@index'])->name('category');
    Route::get('/categories/create', ['uses' => 'CategoryController@create'])->name('category.create');
    Route::post('/categories/create', ['uses' => 'CategoryController@store'])->name('category.store');

    Route::get('/menus', ['uses' => 'MenuController@index'])->name('menu');
    Route::get('/menus/create', ['uses' => 'MenuController@create'])->name('menu.create');
    Route::post('/menus/create', ['uses' => 'MenuController@store'])->name('menu.store');

});