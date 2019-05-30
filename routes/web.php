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

Route::get('/', 'FrontController@index')->name('index');
Route::get('/index/{judul}', 'FrontController@viewEach')->name('viewEach');
Route::post('/index/article/comment', 'FrontController@comment')->name('commentArticle');



Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('main');
    Route::get('/dashboard/category', 'AdminController@indexCategory')->name('category');
    Route::get('/dashboard/post', 'AdminController@indexArticle')->name('post');
    Route::get('/dashboard/comment', 'AdminController@indexComment')->name('comment');

    //category
    Route::post('/dashboard/category/store', 'AdminController@storeCategory')->name('storeCategory');
    Route::get('/dashboard/category/delete/{id}', 'AdminController@deleteCategory')->name('deleteCategory');
    Route::put('/dashboard/category/update/{id}', 'AdminController@updateCategory')->name('updateCategory');

    //Post
    Route::get('/dashboard/post/form', 'AdminController@createArticle')->name('createArticle');
    Route::post('/dashboard/post/form/store', 'AdminController@storeArticle')->name('storeArticle');
    Route::get('/dashboard/post/delete/{id}', 'AdminController@deleteArticle')->name('deleteArticle');
    Route::get('/dashboard/post/each/{judul}', 'AdminController@viewEachArticle')->name('viewEachArticle');
    Route::get('/dashboard/post/edit/{id}', 'AdminController@editArticle')->name('editArticle');
    Route::put('/dashboard/post/update', 'AdminController@updateArticle')->name('updateArticle');
    Route::get('/dashboard/post/trash', 'AdminController@trash')->name('trash');
    Route::get('/dashboard/post/trash/restore/{id}', 'AdminController@restore')->name('restore');
    Route::get('/dashboard/post/trash/permanent/{id}', 'AdminController@permanent')->name('permanent');
    Route::get('/dashboard/post/trash/restoreAll', 'AdminController@restoreAll')->name('restoreAll');
    Route::get('/dashboard/post/trash/permanentAll', 'AdminController@permanentAll')->name('permanentAll');

    //comment
    Route::get('/dashboard/comment/delete/{id}', 'AdminController@deleteComment')->name('deleteComment');
    Route::post('/dashboard/comment/reply', 'AdminController@reply')->name('replyComment');
        
});

Auth::routes();