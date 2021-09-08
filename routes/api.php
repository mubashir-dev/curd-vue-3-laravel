<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// Route::post('/register','AuthController@register');
// Route::post('/login','AuthController@login');

// Route::group(['middleware'=>['auth:sanctum']],function(){
//     Route::apiResource('todo','TodoController');
//     Route::post('/logout','AuthController@logout');
// });
// Route::apiResource('todo','TodoController');
Route::apiResource('todo','TodoController');
Route::get('todos/completed/{id}','TodoController@completed');
Route::get('todos/undocompleted/{id}','TodoController@undocompleted');
Route::get('todos/completedIndex','TodoController@completedIndex');

