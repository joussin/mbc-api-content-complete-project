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

// API

Route::get('route/search', [\MbcApiContent\Infrastructure\Api\Http\Controllers\RouteController::class, 'search']);

Route::get('page/search', [\MbcApiContent\Infrastructure\Api\Http\Controllers\PageController::class, 'search']);

Route::get('page-content/search', [\MbcApiContent\Infrastructure\Api\Http\Controllers\PageContentController::class, 'search']);


Route::apiResource('route', \MbcApiContent\Infrastructure\Api\Http\Controllers\RouteController::class);
Route::apiResource('page', \MbcApiContent\Infrastructure\Api\Http\Controllers\PageController::class);
Route::apiResource('page-content', \MbcApiContent\Infrastructure\Api\Http\Controllers\PageContentController::class);
