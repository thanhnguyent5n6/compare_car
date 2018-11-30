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


// BACKEND
Route::get('/admin', function(){
	// di chuyển đến route admin/user
	return redirect()->route('admin.index');
});
Route::get('/login','AdminController@getLogin')->name('admin.get.login');
Route::post('/login','AdminController@postLogin')->name('admin.post.login');
Route::get('/logout','AdminController@getLogout')->name('admin.get.logout');
// Route::get('/logout','AdminController@getLogout')->name('admin.get.logout');
Route::group(array('prefix'=>'/admin','middleware'=>'CheckAdmin'),function(){
	// Route::get('/logout',function(){
	// 	Auth::logout();
	// 	return redirect('/login');
	// });
    // index
    Route::get('/index','AdminController@getIndex')->name('admin.index');
    //cars
    Route::resource('/cars','CarController');
    Route::get('cars/edit/{id}','CarController@edit');
    Route::post('cars/search','CarController@search')->name('admin.car.search');
    Route::get('cars/searchCategory/{id}','CarController@searchCategory');
    Route::get('cars/searchStyle/{id}','CarController@searchStyle');
    //Route::get('/cars/edit/{id}','CarController@edit')->name('cars-edit');
    //Route::post('/cars/edit/{id}','CarController@edit')->name('cars-update');
    Route::post('/cars/edit/{id}','CarController@do_edit')->name('cars-update');
    Route::post('/cars/editimg/{id}','CarController@editImg');
    Route::post('/add-car','CarController@addCar')->name('admin.add.car');
    Route::get('/delete-car/{id}','CarController@destroy')->name('cars-destroy');
    //category cars
    Route::resource('category-cars','CategoryCarController');
    Route::get('category-cars-del/{id}','CategoryCarController@del')->name('category-cars-del');
    Route::get('category-cars-edit/{id}','CategoryCarController@getEdit')->name('category-cars-edit');
    Route::post('category-cars-do-edit/{id}','CategoryCarController@doEdit')->name('category-cars-edit');
    Route::get('categories-search','CategoryCarController@getSearch')->name('categories-search');
    // style cars
    Route::resource('style-cars','StyleCarController');
    Route::get('style-search','StyleCarController@getSearch')->name('style-search');
    Route::get('style-cars-del/{id}','StyleCarController@del')->name('style-cars-del');
    Route::get('style-cars-edit/{id}','StyleCarController@getEdit')->name('style-cars-edit');
    Route::post('style-cars-do-edit/{id}','StyleCarController@doEdit')->name('style-cars-edit');

    //crawl data
    Route::get('crawl','CrawlerController@index')->name('admin.crawl');
    Route::post('post-crawl','CrawlerController@store')->name('admin.post.crawl');
});

// FRONT END
Route::get('/','PageController@index')->name('home');
Route::get('/category-car/{id}','PageController@getCategory')->name('view.category');
Route::get('/style-car/{id}','PageController@getStyle')->name('view.style');
Route::get('/show-info/{id}','PageController@show_info')->name('view.showinfo');
Route::get('/compare','CompareController@index')->name('view.compare');
Route::post('search-keyup','CompareController@search');
Route::get('/search-compare','CompareController@searchingCompare');
Route::get('add-compare/{id}','CompareController@addCompare');
Route::get('/destroy-compare/{id}','CompareController@destroy');
Route::get('/destroy-compare-first/{id}','CompareController@destroy_first');