<?php

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

use Modules\Assetmanager\Http\Controllers\AssetmanagerController;
use Modules\Assetmanager\Http\Controllers\BrandController;
use Modules\Assetmanager\Http\Controllers\SupplyController;
use Modules\Assetmanager\Http\Controllers\LocationController;
use Modules\Assetmanager\Http\Controllers\AssettypeController;

Route::prefix('assetmanager')->group(function() {
    Route::get('/', 'AssetmanagerController@index');
});

Route::get('theuser/{department}','AssetmanagerController@getusersbydepart')->name('users.by.department');

Route::resource('assetmanager',AssetmanagerController::class)->middleware('auth');

Route::resource('assettype',AssettypeController::class)->middleware(['auth']);
Route::resource('brand',BrandController::class)->middleware(['auth']);
Route::resource('supply',SupplyController::class)->middleware(['auth']);
Route::resource('location',LocationController::class)->middleware(['auth']);
