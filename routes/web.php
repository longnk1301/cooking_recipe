<?php

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::get('admin', 'HomeController@moveAdmin')->name('admin.index')->middleware('auth');

Route::resource('admin-info', 'UserController');

Route::get('recipe', 'HomeController@getRecipe')->name('recipe');

Route::get('get-lists', 'HomeController@getLists')->name('lists');

Route::post('find-text', 'HomeController@findText');

Route::resource('recipes', 'RecipeController');

Route::get('up-like-number', 'HomeController@upLikeNumber')->name('like.up');
Route::get('up-care-number', 'HomeController@upCareNumber')->name('care.up');
Route::get('change-rate-number', 'HomeController@changeRateNumber')->name('rate.change');

// get data axios
Route::get('dish-types', 'HomeController@getDishTypes');
Route::get('cooking-methods', 'HomeController@getCookingMethods');
Route::get('courses', 'HomeController@getCourses');
Route::get('get-auth-current', 'HomeController@getAuthCurrent');

Route::get('get-my-recipes', 'HomeController@getMyRecipe');

Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profiles', 'HomeController@Profile')->name('profiles');

Route::put('change-none/{id}', 'HomeController@ChangeNone')->name('profiles.none');
Route::put('change-pending/{id}', 'HomeController@ChangePending')->name('profiles.pending');
Route::put('change-disable/{id}', 'HomeController@ChangeDisable')->name('profiles.disable');
Route::put('change-show/{id}', 'HomeController@ChangeShow')->name('profiles.show');

Route::get('profile', 'HomeController@getProfile')->name('profile');

Route::put('edit-profile/{id}', 'HomeController@EditProfile')->name('profile.edit');
