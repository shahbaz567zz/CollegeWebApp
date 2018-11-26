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

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);
Route::get('/post', ['as'=>'all.post', 'uses'=>'PostsController@index']);
Route::get('/college/{id}', ['as'=>'home.college', 'uses'=>'CollegesController@getCollege']);
Route::post('/college/comment', ['as'=>'college.comment.post', 'uses'=>'CollegesController@storeCollegeComment']);
Route::post('/college/comment/reply', ['as'=>'college.comment.reply.post', 'uses'=>'CollegesController@storeCollegeCommentReply']);
Route::get('/college', ['as'=>'all.college', 'uses'=>'CollegesController@index']);
Route::get('/comingsoon', ['as'=>'home.comingsoon', 'uses'=>'HomeController@comingsoon']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', 'AdminController@index');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/headlines', 'AdminHeadlinesController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/college/regions', 'AdminCollegeRegionsController');
    Route::resource('admin/college/categories', 'AdminCollegeCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'CommentRepliesController');
    Route::resource('admin/colleges', 'AdminCollegesController');
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});