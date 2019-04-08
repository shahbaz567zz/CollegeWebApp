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

// Public News routes
Route::get('/news', 'NewsController@getNewsList');
Route::get('/news/{id}',['uses'=>'NewsController@getSingleNews', 'as'=>'news.single']);


Route::get('/college', ['as'=>'all.college', 'uses'=>'CollegesController@index']);
Route::get('/comingsoon', ['as'=>'home.comingsoon', 'uses'=>'HomeController@comingsoon']);

Route::group(['middleware' => 'admin'], function(){
    /**
     * NOTE: define all the get and post methods before ::resource
     */
    Route::get('/admin', 'AdminController@index');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/headlines', 'AdminHeadlinesController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'CommentRepliesController');
    
    // Table routes
    Route::resource('admin/table', 'TableController');

    //College routes
    Route::resource('admin/colleges', 'AdminCollegesController');
    Route::get('admin/colleges/single/comment/{id}', ['uses'=>'CollegesController@getSingleCollegeComments', 'as'=>'admin.college.comments.show']);
    Route::get('admin/colleges/comment/replies/{id}', ['uses'=>'CollegesController@getCollegeCommentsReply', 'as'=>'admin.college.comment.replies.show']);
    Route::post('admin/colleges/replies/update/{id}',['uses'=>'CollegesController@updateCollegeCommentReply', 'as'=>'admin.College.replies.update'] );
    Route::delete('admin/colleges/replies/delete/{id}',['uses'=>'CollegesController@deleteCollegeCommentReply', 'as'=>'admin.College.replies.delete'] );
    Route::post('admin/colleges/comment/update/{id}',['uses'=>'CollegesController@updateCollegeComment', 'as'=>'admin.College.comment.update'] );
    Route::delete('admin/colleges/comment/delete/{id}',['uses'=>'CollegesController@deleteCollegeComment', 'as'=>'admin.College.comment.delete'] );
    Route::resource('admin/college/regions', 'AdminCollegeRegionsController');
    Route::resource('admin/college/categories', 'AdminCollegeCategoriesController');

    //News routes
    Route::delete('admin/news/categories/delete/{categoryid}', 'NewsController@destroyCategory');
    Route::post('admin/news/categories/store', 'NewsController@storeCategories');
    Route::get('admin/news/single/comment/{id}', ['uses'=>'NewsController@getSingleCollegeComments', 'as'=>'admin.college.comments.show']);
    Route::get('admin/news/comment/replies/{id}', ['uses'=>'NewsController@getCollegeCommentsReply', 'as'=>'admin.college.comment.replies.show']);
    Route::get('admin/news/categories', ['uses'=>'NewsController@getCategories', 'as'=>'admin.news.categories']);
    Route::post('admin/news/replies/update/{id}',['uses'=>'AdminCommentsController@updateNewsCommentReplies', 'as'=>'admin.news.replies.update'] );
    Route::delete('admin/news/replies/delete/{id}',['uses'=>'AdminCommentsController@deleteNewsCommentReplies', 'as'=>'admin.news.replies.delete'] );
    Route::post('admin/news/comment/update/{id}',['uses'=>'AdminCommentsController@updateNewsComment', 'as'=>'admin.news.comment.update'] );
    Route::delete('admin/news/comment/delete/{id}',['uses'=>'AdminCommentsController@deleteNewsComment', 'as'=>'admin.news.comment.delete'] );
    Route::resource('admin/news', 'NewsController');

    Route::get('admin/comment/{type}/{id?}',['uses'=>'AdminCommentsController@index', 'as'=>'admin.comment'] );
    Route::get('admin/replies/{type}/{id}',['uses'=>'AdminCommentsController@replies', 'as'=>'admin.replies'] );
    
   
});

Route::group(['middleware' => 'auth'], function(){
    
    Route::post('comment', 'PostCommentsController@store');
    Route::post('comment/reply', 'CommentRepliesController@createReply');
    Route::post('college/comment/reply', ['as'=>'college.comment.reply.post', 'uses'=>'CollegesController@storeCollegeCommentReply']);
    Route::post('college/comment', ['as'=>'college.comment.post', 'uses'=>'CollegesController@storeCollegeComment']);
    //News Comment routes
    Route::post('news/comment/reply', ['as'=>'news.comment.reply.post', 'uses'=>'NewsController@storeNewsCommentReply']);
    Route::post('news/comment', ['as'=>'news.comment.post', 'uses'=>'NewsController@storeNewsComment']);
    
});
