<?php

use Illuminate\Support\Facades\Route;

use Modules\HumanResource\Http\Controllers\Leavetypescontroller;
use Modules\HumanResource\Http\Controllers\LeaveRequestController;

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

// Route::prefix('humanresource')->group(function() {
//     Route::get('/', 'HumanResourceController@index');
// });
// Route::resource('leave_request', LeaveRequestController::class);


Route::prefix('leave_request_data')->group(function() {
    Route::get('/', 'LeaveRequestController@index');
    //Route::get('/', 'LeaveRequestController@index')->middleware('role');
    Route::get('/leave_types','LeaveTypesController@index')->name("atp");
    Route::get('/get-data/{id}','LeaveRequestController@getDuration');


// Route::get('/get_leave_type_duration/{id}', 'LeaveRequestController@getLeaveTypeDuration');

});
//  Route::livewire('/leave-request-fields',MultiSectionForm::class);

Route::middleware(['auth'])->group(function () {
    Route::prefix('leave_request')->group(function () {
        Route::resource('leave_request', Modules\HumanResource\Http\Controllers\LeaveRequestController::class);
        Route::resource('/leave_type', Modules\HumanResource\Http\Controllers\Leavetypescontroller::class);
   
    });
    
}

);

