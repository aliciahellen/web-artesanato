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

Route::redirect('/', 'admin');

Route::group(['prefix' => 'admin'], function () {
	Auth::routes();
	Route::get('/', 'HomeController@index')->name('home.index.get');

	Route::group(['prefix' => 'artesao', 'as' => 'artesao.'], function () {
		Route::get('/', ['as' => 'index.get', 'uses' => 'ArtesaoController@index']);
		Route::get('/{id}', ['as' => 'view.get', 'uses' => 'ArtesaoController@viewGet'])->where('id', '\d+');
		
		Route::get('/add', ['as' => 'add.get', 'uses' => 'ArtesaoController@addGet']);
		Route::post('/add', ['as' => 'add.post', 'uses' => 'ArtesaoController@addPost']);

		Route::get('/edit/{id}', ['as' => 'edit.get', 'uses' => 'ArtesaoController@editGet'])->where('id', '\d+');
		Route::post('/edit/{id}', ['as' => 'edit.post', 'uses' => 'ArtesaoController@editPost'])->where('id', '\d+');

		Route::delete('/del/{id}', ['as' => 'delete', 'uses' => 'ArtesaoController@delete'])->where('id', '\d+');
	});

});

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
	Route::group(['prefix' => 'artesao', 'as' => 'artesao.'], function () {
		Route::get('/', ['as' => 'artesoes.get', 'uses' => 'ArtesaoController@apiArtesaosGet']);
		Route::get('/{id}', ['as' => 'artesao.get', 'uses' => 'ArtesaoController@apiArtesaoGet'])->where('id', '\d+');		
	});
});