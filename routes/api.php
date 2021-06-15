<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->prefix('v1')->group(function () {
    Route::get('books/list', 'BookController@list');
    Route::get('books/by-id/{id}', 'BookController@byId');
    Route::get('books/update', 'BookController@update');
    Route::get('books/{id}', 'BookController@destroy');
});
