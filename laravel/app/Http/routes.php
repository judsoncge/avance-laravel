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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(
	[ 'middleware' => ['secretary.check'] , 'prefix' => 'secretary' ],	
	
	function () 
	{	
		
		Route::get('/home', 'Secretary\HomeController@index');
		
		//users pages
		Route::get('/users', 'Secretary\UserController@showUsersPage');
		Route::get('/users/create', 'Secretary\UserController@showCreatePage');
		Route::post('/create/user', 'Secretary\UserController@create');
		Route::get('/users/{id}/update', 'Secretary\UserController@showUpdatePage');
		Route::put('/update/user/{id}', 'Secretary\UserController@update');
		Route::get('/delete/user/{id}', 'Secretary\UserController@delete');

		//courses pages
		Route::get('/courses', 'Secretary\CourseController@showCoursesPage');
		Route::get('/courses/create', 'Secretary\CourseController@showCreatePage');
		Route::post('/create/course', 'Secretary\CourseController@create');
		Route::get('/courses/{id}/update', 'Secretary\CourseController@showUpdatePage');
		Route::put('/update/course/{id}', 'Secretary\CourseController@update');
		Route::get('/delete/course/{id}', 'Secretary\CourseController@delete');

		//disciplines pages
		Route::get('/disciplines', 'Secretary\DisciplineController@showDisciplinesPage');
		Route::get('/disciplines/create', 'Secretary\DisciplineController@showCreatePage');
		Route::post('/create/discipline', 'Secretary\DisciplineController@create');
		Route::get('/disciplines/{id}/update', 'Secretary\DisciplineController@showUpdatePage');
		Route::put('/update/discipline/{id}', 'Secretary\DisciplineController@update');
		Route::get('/disciplines/{id}/manage-teacher-links', 'Secretary\DisciplineController@showManageTeacherLinks');
		Route::put('/update-teacher-link/discipline/{id}', 'Secretary\DisciplineController@updateTeacherLink');
		Route::get('/delete/discipline/{id}', 'Secretary\DisciplineController@delete');
		Route::get('/unlink-teacher/{teacherId}/discipline/{disciplineId}', 'Secretary\DisciplineController@unlinkTeacher');

		//classrooms pages
		Route::get('/classrooms', 'Secretary\ClassroomController@showClassroomsPage');
		Route::get('/classrooms/create', 'Secretary\ClassroomController@showCreatePage');
     	Route::post('/create/classroom', 'Secretary\ClassroomController@create');
		Route::get('/classrooms/{id}/update', 'Secretary\ClassroomController@showUpdatePage');
		Route::put('/update/classroom/{id}', 'Secretary\ClassroomController@update');
		Route::get('/classrooms/{id}/manage-student-links', 'Secretary\ClassroomController@showManageStudentLinks');
		Route::put('/update-student-link/classroom/{id}', 'Secretary\ClassroomController@updateStudentLink');
		Route::get('/delete/classroom/{id}', 'Secretary\ClassroomController@delete');
		Route::get('/unlink-student/{id}', 'Secretary\ClassroomController@unlinkStudent');
	
	}
);

Route::group(
	[ 'middleware' => ['student.check'] , 'prefix' => 'student' ],	
	
	function () 
	{	
		
		Route::get('/home', 'Student\HomeController@index');
		
	
	}
);

