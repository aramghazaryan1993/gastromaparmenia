<?php
Auth::routes();

Route::get('change-locale/{locale}', function($locale){
    App::setLocale($locale);
   return back();
})->name('change-locale');


Route::redirect('/','/am');
Route::redirect('home','/am');
Route::redirect('register','/am');

Route::group(['prefix' => '{locale?}','where' => ['locale' => '[a-zA-Z]{2}']], function()
{

Route::get('/','IndexController@index')->name('index');

Route::get('RegionList/{id}','RegionListController@Index')->name('region list');

Route::match(['get', 'post'],'Search','SearchController@index')->name('search');

Route::get('test','IndexController@test');


});





Route::group( [ 'prefix' => 'myadmin','middleware' => 'auth','namespace' => 'Admin'], function()
{

Route::get('/', 'HomeController@index')->name('home');
Route::post('EditAbout', 'HomeController@EditAbout')->name('edit about');

Route::get('Event', 'HomeController@Event')->name('event');
Route::post('AddEvent', 'HomeController@AddEvent')->name('add event');
Route::post('EditEvent/{id}', 'HomeController@EditEvent')->name('edit event');
Route::get('DeleteEvent/{id}', 'HomeController@DeleteEvent')->name('delete event');
Route::post('EditContact', 'HomeController@EditContact')->name('edit contact');


Route::get('Region/{id}', 'RegionController@Index')->name('region');
Route::post('EditIframe/{id}', 'RegionController@EditIframe')->name('edit iframe');

Route::post('EditRegionInfoDescription/{id}', 'RegionController@EditRegionInfoDescription')->name('edit region info description');
Route::post('DeleteImgDescription/{id}', 'RegionController@DeleteImgDescription')->name('delete img description'); 
Route::post('AddImageDescription/{id}', 'RegionController@AddImageDescription')->name('add img description');


// Product 
Route::post('EditRegionInfoProduct/{id}', 'RegionController@EditRegionInfoProduct')->name('edit region info product');
Route::post('DeleteImgProduct/{id}', 'RegionController@DeleteImgProduct')->name('delete img product'); 
Route::post('AddImageProduct/{id}', 'RegionController@AddImageProduct')->name('add img product');

// Restoran
Route::post('EditRegionInfoRestoran/{id}', 'RegionController@EditRegionInfoRestoran')->name('edit region info restoran');
Route::post('DeleteImgRestoran/{id}', 'RegionController@DeleteImgRestoran')->name('delete img restoran'); 
Route::post('AddImageRestoran/{id}', 'RegionController@AddImageRestoran')->name('add img restoran');

//Tour
Route::post('EditRegionInfoTour/{id}', 'RegionController@EditRegionInfoTour')->name('edit region info tour');
Route::post('DeleteImgTour/{id}', 'RegionController@DeleteImgTour')->name('delete img tour'); 
Route::post('AddImageTour/{id}', 'RegionController@AddImageTour')->name('add img tour');

//Event
Route::post('EditRegionInfoEvent/{id}', 'RegionController@EditRegionInfoEvent')->name('edit region info event');
Route::post('DeleteImgEvent/{id}', 'RegionController@DeleteImgEvent')->name('delete img event'); 
Route::post('AddImageEvent/{id}', 'RegionController@AddImageEvent')->name('add img event');



                                                // Show  User
  Route::get('show_user','UserController@index')->name('show user');
  Route::post('edit_user/{id}','UserController@EditUser')->name('edit user');
  Route::get('delete_user/{id}','UserController@DeleteUser')->name('user delete');

});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
