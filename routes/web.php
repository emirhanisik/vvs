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


/*
Route::get('/hello', function () {
    //return view('welcome');
    return ('Hello World');
 });

  Route::get('/users/{id}/{name}', function($id,$name){
    return 'This is user '.$name.'with an id of'.$id;
    
     });

 */

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts','PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::get('profile','ProfileController@index');
Auth::routes();

//Kullanıcı bilgileri için oluşturduğumuz route
Route::get('/profile/show','UserController@index')->name('profile.users.show');
Route::put('/profile/edit/{id}','UserController@update');

Route::post('/search','PostsController@search');

Route::post('/comment/{id}','PostsController@comment');
Route::get('/favorites/{id}','PostsController@favorites');

Route::get('favorite','FavoriteController@index');
Auth::routes();



Route::get('/favorite','PostsController@view_favorites');
Route::get('/posts/favorites','PostsController@view_favorites');