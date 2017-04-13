<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('admin/login', ['as' => 'admin.login', function () {
    return view('admin.login');
}]);

Route::get('logout', ['as' => 'users.logout', 'uses' => 'UserController@logout']);

Route::get('/', function () {
    return view('welcome');
});


/* Connected */
Route::get('admin/dashboard', ['as' => 'admin.dashboard', function () {
    return view('admin.home');
}]) ;

// Route::get('admin/dashboard', ['as' => 'admin.home', 'uses' => 'TrackController@index']);

/* Tracks */
Route::get('admin/tracks', ['as' => 'tracks.index', 'uses' => 'TrackController@index']);
Route::get('admin/tracks/create', ['as' => 'tracks.create', 'uses' => 'TrackController@create']);
Route::post('admin/tracks/post/{id}', ['as' => 'tracks.store', 'uses' => 'TrackController@store']);
Route::get('admin/tracks/edit/{id}', ['as' => 'tracks.edit', 'uses' => 'TrackController@edit']);
Route::put('admin/tracks/update/{id}', ['as' => 'tracks.update', 'uses' => 'TrackController@update']);

/* Albums */
Route::get('admin/albums', ['as' => 'albums.index', 'uses' => 'AlbumController@index']);
Route::get('admin/albums/create', ['as' => 'albums.create', 'uses' => 'AlbumController@create']);
Route::post('admin/albums/post', ['as' => 'albums.store', 'uses' => 'AlbumController@store']);
Route::get('admin/albums/edit/{id}', ['as' => 'albums.edit', 'uses' => 'AlbumController@edit']);
Route::put('admin/albums/update/{id}', ['as' => 'albums.update', 'uses' => 'AlbumController@update']);

/* Videos */
Route::get('admin/videos', ['as' => 'videos.index', 'uses' => 'VideoController@index']);
Route::get('admin/videos/create', ['as' => 'videos.create', 'uses' => 'VideoController@create']);
Route::post('admin/videos/post/{id}', ['as' => 'videos.store', 'uses' => 'VideoController@store']);
Route::get('admin/videos/edit/{id}', ['as' => 'videos.edit', 'uses' => 'VideoController@edit']);
Route::put('admin/videos/update/{id}', ['as' => 'videos.update', 'uses' => 'VideoController@update']);

/* Authors */
Route::get('admin/authors', ['as' => 'authors.index', 'uses' => 'AuthorController@index']);
Route::get('admin/authors/create', ['as' => 'authors.create', 'uses' => 'AuthorController@create']);
Route::post('admin/authors/post/{id}', ['as' => 'authors.store', 'uses' => 'AuthorController@store']);
Route::get('admin/authors/edit/{id}', ['as' => 'authors.edit', 'uses' => 'AuthorController@edit']);
Route::put('admin/authors/update/{id}', ['as' => 'authors.update', 'uses' => 'AuthorController@update']);

/* Users */
Route::get('admin/users', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::post('admin/users/check', ['as' => 'users.check', 'uses' => 'UserController@check']);
Route::get('admin/users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
Route::post('admin/users/post/{id}', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::get('admin/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::put('admin/users/update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);

/* Profiles */
Route::get('admin/profiles', ['as' => 'profiles.index', 'uses' => 'ProfileController@index']);
Route::get('admin/profiles/create', ['as' => 'profiles.create', 'uses' => 'ProfileController@create']);
Route::post('admin/profiles/post/{id}', ['as' => 'profiles.store', 'uses' => 'ProfileController@store']);
Route::get('admin/profiles/edit/{id}', ['as' => 'profiles.edit', 'uses' => 'ProfileController@edit']);
Route::put('admin/profiles/update/{id}', ['as' => 'profiles.update', 'uses' => 'ProfileController@update']);

/* Subscriptions */
Route::get('admin/subscriptions', ['as' => 'subscriptions.index', 'uses' => 'SubscriptionController@index']);
Route::get('admin/subscriptions/create', ['as' => 'subscriptions.create', 'uses' => 'SubscriptionController@create']);
Route::post('admin/subscriptions/post/{id}', ['as' => 'subscriptions.store', 'uses' => 'SubscriptionController@store']);
Route::get('admin/subscriptions/edit/{id}', ['as' => 'subscriptions.edit', 'uses' => 'SubscriptionController@edit']);
Route::put('admin/subscriptions/update/{id}', ['as' => 'subscriptions.update', 'uses' => 'SubscriptionController@update']);

/* Subscription Types */
Route::get('admin/subscription_types', ['as' => 'subscription_types.index', 'uses' => 'SubscriptionTypeController@index']);
Route::get('admin/subscription_types/create', ['as' => 'subscription_types.create', 'uses' => 'SubscriptionTypeController@create']);
Route::post('admin/subscription_types/post/{id}', ['as' => 'subscription_types.store', 'uses' => 'SubscriptionTypeController@store']);
Route::get('admin/subscription_types/edit/{id}', ['as' => 'subscription_types.edit', 'uses' => 'SubscriptionTypeController@edit']);
Route::put('admin/subscription_types/update/{id}', ['as' => 'subscription_types.update', 'uses' => 'SubscriptionTypeController@update']);

/* Categories */
Route::get('admin/categories', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);
Route::get('admin/categories/create', ['as' => 'categories.create', 'uses' => 'CategoryController@create']);
Route::post('admin/categories/post', ['as' => 'categories.store', 'uses' => 'CategoryController@store']);
Route::get('admin/categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoryController@edit']);
Route::put('admin/categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoryController@update']);
Route::get('admin/categories/delete/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoryController@destroy']);

/* Trask Types */
Route::get('admin/track_types', ['as' => 'track_types.index', 'uses' => 'TrackTypeController@index']);
Route::get('admin/track_types/create', ['as' => 'track_types.create', 'uses' => 'TrackTypeController@create']);
Route::post('admin/track_types/post', ['as' => 'track_types.store', 'uses' => 'TrackTypeController@store']);
Route::get('admin/track_types/edit/{id}', ['as' => 'track_types.edit', 'uses' => 'TrackTypeController@edit']);
Route::put('admin/track_types/update/{id}', ['as' => 'track_types.update', 'uses' => 'TrackTypeController@update']);

