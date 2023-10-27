<?php


use Modules\Settings\Http\Controllers\SettingsController;
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

// Route::prefix('settings')->group(function() {
//     Route::get('/', 'SettingsController@index');

// });

Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
// Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
