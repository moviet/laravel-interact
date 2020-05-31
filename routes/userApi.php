<?php

// Api End User
Route::namespace('API')->group(function () {	
    Route::apiResource('add', 'AddFriendController')->only(['index']);
    Route::apiResource('add/as', 'AddFriendController')->only(['index']);
    Route::apiResource('add/as/friend', 'AddFriendController')->only(['store']);
    Route::apiResource('add/as/attract', 'InteractController')->only(['store']);
    Route::apiResource('holiday', 'StatusController')->only(['store']);
    Route::apiResource('holiday/status', 'StatusController')->only(['index']);
    Route::apiResource('holiday/status/off', 'StatusController')->only(['index']);
    Route::get('holiday/status/off/{id}/{data}/{token}', 'StatusController@remove')->name('holiday.remove');
    Route::apiResource('post', 'LikeableController')->only(['index']);
    Route::apiResource('post/reflect', 'LikeableController')->only(['store']);    
    Route::apiResource('photo', 'PhotoProfileController')->only(['index']);    
    Route::apiResource('photo/post', 'PhotoProfileController')->only(['store']);
    Route::post('photo/remove', 'PhotoProfileController@remove')->name('photo.remove');
});