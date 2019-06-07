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
Route::get('/profile/{id}', 'ProfileController@show_page');
Route::put('/profile/edit/{id}','UserController@update');

Route::post('/search','PostsController@search');

Route::post('/comment/{id}','PostsController@comment');
Route::get('/favorites/{id}','PostsController@favorites');

Route::get('favorite','FavoriteController@index');
Auth::routes();



Route::get('/favorite','PostsController@view_favorites');
Route::get('/posts/favorites','PostsController@view_favorites');
Route::get('/removeFavorite/{id}','PostsController@removeFavorite');
Route::get('/removeComment/{id}','PostsController@removeComment');


//Category Routes
Route::get('/category/family', 'PostsController@familyCategory');
Route::get('/category/friend', 'PostsController@friendCategory');
Route::get('/category/newyear', 'PostsController@newyearCategory');
Route::get('/category/culture', 'PostsController@cultureCategory');
Route::get('/category/semester', 'PostsController@semesterCategory');
Route::get('/category/summer', 'PostsController@summerCategory');

Route::resource('notifications','NotificationController');

//City Routes
Route::get('/city/istanbul', 'PostsController@istanbul');
Route::get('/city/ankara', 'PostsController@ankara');
Route::get('/city/izmir', 'PostsController@izmir');
Route::get('/city/antalya', 'PostsController@antalya');
Route::get('/city/paris', 'PostsController@paris');
Route::get('/city/berlin', 'PostsController@berlin');
Route::get('/city/newyork', 'PostsController@newyork');
Route::get('/city/losangeles', 'PostsController@losangeles');
Route::get('/city/viyana', 'PostsController@viyana');
Route::get('/city/sydney', 'PostsController@sydney');
Route::get('/city/dubai', 'PostsController@dubai');
Route::get('/city/rio', 'PostsController@rio');
Route::get('/city/prag', 'PostsController@prag');
Route::get('/city/marakes', 'PostsController@marakes');
Route::get('/city/amsterdam', 'PostsController@amsterdam');
Route::get('/city/londra', 'PostsController@londra');
Route::get('/city/barcelona', 'PostsController@barcelona');
Route::get('/city/madrid', 'PostsController@madrid');
Route::get('/city/roma', 'PostsController@roma');
Route::get('/city/venedik', 'PostsController@venedik');
Route::get('/city/porto', 'PostsController@porto');
Route::get('/city/moskova', 'PostsController@moskova');
Route::get('/city/kiev', 'PostsController@kiev');
Route::get('/city/belgrad', 'PostsController@belgrad');