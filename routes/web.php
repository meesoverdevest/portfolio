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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
	Route::resource('years', 'YearController');
	Route::resource('periods', 'PeriodController');
	Route::resource('courses', 'CourseController');
	// Route::resource('assignments', 'AssignmentController');

	Route::group(['prefix' => 'courses'], function () {
		Route::get('assignments/{course_id}', ['as' => 'assignments', 'uses' => 'AssignmentController@index']);
		Route::get('assignments/create/{course_id}', ['as' => 'assignments.create', 'uses' => 'AssignmentController@create']);
		Route::get('assignments/edit/{course_id}/{assignment_id}', ['as' => 'assignments.edit', 'uses' => 'AssignmentController@edit']);
		Route::delete('assignments/delete/{course_id}/{assignment_id}', ['as' => 'assignments.delete', 'uses' => 'AssignmentController@destroy']);
		Route::post('assignments/assign', ['as' => 'assignments.assign', 'uses' => 'AssignmentController@assign']);
		Route::post('assignments/update/{id}', ['as' => 'assignments.update', 'uses' => 'AssignmentController@update']);
		Route::post('assignments/store', ['as' => 'assignments.store', 'uses' => 'AssignmentController@store']);
	});

	Route::group(['prefix' => 'assignments'], function() {
		Route::get('blocks/{assignment_id}', ['as' => 'blocks', 'uses' => 'BlockController@index']);
	});
});