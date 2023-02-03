<?php


use Illuminate\Support\Facades\Log;
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




////// BackofficeController
Route::get('/', ['uses' =>  '\MbcApiContent\Domain\BackOffice\Http\Controllers\Bo\BoController@index']);
Route::get('/wysiwyg', ['uses' => '\MbcApiContent\Domain\BackOffice\Http\Controllers\Bo\BoController@wysiwyg']);
//Route::get('/wysiwyg/inline', ['uses' => '\MbcApiContent\Domain\BackOffice\Http\Controllers\Bo\BoController@wysiwygInline']);
//
//Route::get('/wysiwyg/edit/{templateId}', ['uses' => '\MbcApiContent\Domain\BackOffice\Http\Controllers\Bo\BoController@wysiwygEdit']);
//Route::get('/wysiwyg/inline/edit/{templateId}', ['uses' => '\MbcApiContent\Domain\BackOffice\Http\Bo\Backoffice\BoController@wysiwygInlineEdit']);
//
//Route::get('/wysiwyg/editor_example', ['uses' => '\MbcApiContent\Domain\BackOffice\Http\Controllers\Bo\BoController@editorExample']);





