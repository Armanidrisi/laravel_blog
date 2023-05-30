<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


//auth routes
Auth::routes();

Route::redirect('/', '/blog');

//Blog Routes
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');

// Category route
Route::get('/category/{id}', 'CategoryController@index')->name('category.index');

// Comment routes
Route::post('/comment/add', 'CommentController@store')->name('comment.store');


//Contact routes
Route::get('/contact', 'ContactController@index')->name('contact.show');
Route::post('/contact','ContactController@send')->name('contact.submit');

//Page Routes
Route::get('/page/{id}', 'pageController@show')->name('pages.show');

//Admin Routes
Route::prefix('admin')->middleware('admin')->group(function () {
  //dashboard
  Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  //user routes
  Route::get('/users', 'AdminController@indexUsers')->name('admin.users');
  Route::get('/users/create', 'AdminController@createUser')->name('admin.users.create');
  Route::post('/users/create', 'AdminController@storeUser')->name('admin.users.store');
  Route::get('/users/{id}/edit', 'AdminController@editUser')->name('admin.users.edit');
  Route::put('/users/{id}/update', 'AdminController@updateUser')->name('admin.users.update');
  Route::get('/users/{id}/delete', 'AdminController@destroyUser')->name('admin.users.delete');
  //category routes
  Route::get('/categories', 'AdminController@indexCategories')->name('admin.categories');
  Route::get('/categories/create', 'AdminController@createCategory')->name('admin.categories.create');
  Route::post('/categories/create', 'AdminController@storeCategory')->name('admin.categories.store');
  Route::get('/categories/{id}/edit', 'AdminController@editCategory')->name('admin.categories.edit');
  Route::put('/categories/{id}/update', 'AdminController@updateCategory')->name('admin.categories.update');
  Route::get('/categories/{id}/delete', 'AdminController@destroyCategory')->name('admin.categories.delete');
  //comment routes
  Route::get('/comments', 'AdminController@indexComments')->name('admin.comments');
  Route::get('/comments/{id}/delete', 'AdminController@destroyComment')->name('admin.comments.delete');
  //page routes
  Route::get('/pages', 'AdminController@indexPages')->name('admin.pages');
  Route::get('/pages/create', 'AdminController@createPage')->name('admin.pages.create');
  Route::post('/pages/create', 'AdminController@storePage')->name('admin.pages.store');
  Route::get('/pages/{id}/edit', 'AdminController@editPage')->name('admin.pages.edit');
  Route::put('/pages/{id}/edit', 'AdminController@updatePage')->name('admin.pages.update');
  Route::put('/pages/{id}/delete', 'AdminController@destroyPage')->name('admin.pages.delete');
  //post Routes
  Route::get('/posts', 'AdminController@indexPosts')->name('admin.posts');
  Route::get('/posts/add', 'AdminController@createPost')->name('admin.posts.create');
  Route::post('/posts/add', 'AdminController@storePost')->name('admin.posts.store');
  Route::get('/posts/{id}/edit', 'AdminController@editPost')->name('admin.posts.edit');
  Route::put('/posts/{id}/edit', 'AdminController@updatePost')->name('admin.posts.update');
  Route::get('/posts/{id}/delete', 'AdminController@deletePost')->name('admin.posts.delete');
});