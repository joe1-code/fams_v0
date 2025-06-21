<?php

use App\Http\Controllers\Membership\MemberController;
use Illuminate\Support\Facades\Route;

/**
/**
 * MEMBERSHIP
 */

Route::get('reset_password', [MemberController::class, 'resetPassword'])->name('reset_password');
Route::prefix('memberships')->name('membership.')->group(function (){

     Route::post('post_password', [MemberController::class, 'postPassword'])->name('post_password');
     Route::get('new_password/{id}', [MemberController::class, 'newPassword'])->name('new_password');
     Route::post('reset_password', [MemberController::class, 'resetPassword'])->name('reset_password');
     Route::post('store_password', [MemberController::class, 'storePassword'])->name('store_password');
     Route::post('/register_member', [App\Http\Controllers\Membership\MemberController::class, 'registerMember'])->name('register_member');


 });
Route::group([
    'namespace' => 'membership',
], function() {



    Route::group(['prefix' => 'membership',  'as' => 'membership'], function() {

        Route::get('/', function () {
            return view('backend.membership.index');
        })->name('index');


        Route::group(['prefix' => 'register_member',  'as' => 'register_member'], function() {

            Route::get('/', 'memberController@index')->name('index');
            // Route::get('report', 'OshAuditController@indexReport')->name('report');
            

            
        });

    });

});
