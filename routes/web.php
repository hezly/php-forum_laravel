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

Route::get('/','PagesController@home');
Route::get('question','ForumController@getPost');
Route::POST('question','ForumController@postQuestion');
Route::get('question/mypost','ForumController@viewMyPost');
Route::get('question/viewUser','ForumController@viewUser');
Route::get('question/{slug}','ForumController@viewPost');
Route::group(['prefix' => 'question'], function(){
	Route::post('reply',[
		'as' => 'save_reply',
		'uses' => 'ForumController@saveReply'
		]);
	Route::delete('post',[
		'as' => 'delete_question',
		'uses' => 'ForumController@deleteQuestion'
		]);
	Route::delete('reply',[
		'as' => 'delete_reply',
		'uses' => 'ForumController@deleteReply'
		]);
	Route::get('{id}/edit',[
		'as' => 'get_edit_post',
		'uses' => 'ForumController@getEditPost'
		]);
	Route::post('edit',[
		'as' => 'edit_post',
		'uses' => 'ForumController@saveEditPost'
		]);
	Route::delete('user',[
		'as' => 'delete_user',
		'uses' => 'ForumController@deleteUser'
		]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/forum', 'PagesController@forum')->name('forum');

