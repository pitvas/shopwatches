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

Route::resource('/','IndexController',['only'=>['index'],
                                      'names'=>['index'=>'home']]);


Route::resource('catalog/{sex?}/{brd?}/items', 'CatalogController',[
	'parametres'=>['items'=>'sku']
	
]);

Route::resource('articles', 'ArticlesController',['parametres'=>[
	'articles'=>'alias'
]]);

Route::resource('contact', 'ContactController');

Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat']);

Route::get('filter', 'FilterController@filter');



Route::get('search', 'SearchController@search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/callback','CallbackController@index');

 Route::post('send-email', 'MailSetting@send');