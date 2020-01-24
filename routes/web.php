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

Route::get('/', 'TestsController@index')->name('show_tests');
Route::get('/admin/', 'TestsController@index')->name('show_tests');
Route::get('/admin/test/create', 'TestsController@create')->name('create_test');
Route::post('/admin/test/store', 'TestsController@store')->name('store_test');
Route::get('/admin/test/edit/{test_id}', 'TestsController@edit')->name('edit_test');
Route::post('/admin/test/update/{test_id}', 'TestsController@update')->name('update_test');

Route::post('/admin/question/store/{test_id}', 'QuestionsController@store')->name('store_question');