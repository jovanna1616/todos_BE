<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/todos', 'TodosController@index');
Route::middleware('api')->get('/todos/{id}', 'TodosController@show');
Route::middleware('api')->post('/todos', 'TodosController@store');
Route::middleware('api')->put('/todos/{id}', 'TodosController@update');
Route::middleware('api')->delete('/todos/{id}', 'TodosController@destroy');

