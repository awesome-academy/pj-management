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

Route::get('/', 'PageController@home');
Route::group(['middleware' => ['auth', 'confirmation'], 'prefix' => 'subject'], function() {
    Route::get('/create', 'SubjectController@showCreateForm');
    Route::post('/create', 'SubjectController@create');
    Route::get('/', 'SubjectController@getAllSubjects');
    Route::get('{id}/delete', 'SubjectController@delete');
});

Route::group(['middleware' => ['auth', 'confirmation'], 'prefix' => 'group'], function() {
    Route::get('create', 'GroupController@showCreateForm')->name('createGroup');
    Route::post('create', 'GroupController@create');
    Route::get('/', 'GroupController@getAllGroups');
    Route::get('/{id}/exercise', 'ExerciseController@getExercise');
    Route::get('/{id}/detail', 'GroupController@show');
    Route::get('/{id}/delete', 'GroupController@delete');
    Route::get('/{id}/join', 'GroupController@joinGroup');
    Route::get('{id}/members', 'GroupController@groupUser');
    Route::get('myGroups', 'GroupController@myGroups')->name('myGroup');
    Route::get('{id}/delete', 'GroupController@delete');
    Route::get('{id}/edit', 'GroupController@showUpdate')->name('edit_group');
    Route::put('{id}/edit', 'GroupController@update');
});

Route::group(['middleware' => ['auth', 'confirmation'], 'prefix' => 'task'], function() {
    Route::get('{id}/create', 'TaskController@showUploadForm');
    Route::post('{id}/create', 'TaskController@upload');
    Route::get('/', 'TaskController@getAll');
    Route::get('{id}/delete', 'TaskController@delete');
    Route::get('{id}/download', 'TaskController@download');
    Route::get('{id}/owner', 'TaskController@taskOwner');
});

Route::group(['middleware' => ['auth', 'confirmation'], 'prefix' => 'exercise'], function() {
    Route::get('/', 'ExerciseController@getAll');
    Route::get('{id}/create', 'ExerciseController@showCreateForm');
    Route::post('{id}/create', 'ExerciseController@upload');
    Route::get('{id}/detail', 'ExerciseController@show');
    Route::get('{id}/delete', 'ExerciseController@delete');
    Route::get('{id}/task', 'TaskController@taskOnExercise');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'confirmation'], 'prefix' => 'user'], function() {
    Route::get('/create', 'UserController@getCreate')->name('createUser');
    Route::post('/postCreate', 'UserController@postCreate')->name('postCreateUser');
    Route::get('{id}/create', 'ExerciseController@showCreateForm');
    Route::post('{id}/create', 'ExerciseController@upload');
    Route::get('{id}/detail', 'UserController@show');
    Route::get('{id}/delete', 'UserController@delete');
    Route::get('/', 'UserController@getAll')->name('viewUser');
});
Route::get('account/{id}/confirm', 'UserController@confirm')->name('MailConfirm')->middleware('check.guest');
