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

Route::get('/', 'PlayController@index')->name('show_play');
Route::get('/test/{test_id}', 'PlayController@start')->name('start_play');
Route::get('/test/play/{play_id}', 'PlayController@play')->name('do_play');
Route::post('/test/check/{play_id}', 'PlayController@store')->name('check_uanswer');
Route::get('/test/end/{play_id}', 'PlayController@end')->name('end_play');

Route::get('/admin/', 'TestsController@index')->name('show_tests');
Route::get('/admin/test/create', 'TestsController@create')->name('create_test');
Route::post('/admin/test/store', 'TestsController@store')->name('store_test');
Route::get('/admin/test/edit/{test_id}', 'TestsController@edit')->name('edit_test');
Route::post('/admin/test/update/{test_id}', 'TestsController@update')->name('update_test');
Route::post('/admin/test/destroy/{test_id}', 'TestsController@destroy')->name('destroy_test');

Route::post('/admin/question/store/{test_id}', 'QuestionsController@store')->name('store_question');
Route::post('/admin/question/destroy/{test_id}', 'QuestionsController@destroy')->name('destroy_question');