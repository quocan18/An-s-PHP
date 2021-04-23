<?php
Route::get('demo','Controller@demo')->name('demo');

Route::get('view_login_admin','Controller@login')->name('view_login_admin');
Route::post('view_login_admin','Controller@process_login')->name('process_login_admin');
Route::get('view_login_teacher','Controller@login_teacher')->name('view_login_teacher');
Route::post('view_login_teacher','Controller@process_login_teacher')->name('process_login_teacher');
Route::get('logout','Controller@logout')->name('logout');
Route::get('logout_teacher','Controller@logout_teacher')->name('logout_teacher');
Route::get('test','Controller@test');

Route::group(['prefix'=>'classes','middleware' => 'CheckAdmin'],
	function ()
{
	Route::get("view_all_classes","Admin\ClassesController@view_all_classes")->name('view_all_classes');
	Route::get("view_insert_classes","Admin\ClassesController@view_insert_classes")->name('view_insert_classes');
	Route::post("process_insert_classes","Admin\ClassesController@process_insert_classes")->name('process_insert_classes');

	Route::get("view_update_classes/{classes_id}","Admin\ClassesController@view_update_classes")->name('view_update_classes');
	Route::post("process_update_classes/{classes_id}","Admin\ClassesController@process_update_classes")->name('process_update_classes');
});

Route::group(['prefix'=>'subjects','middleware' => 'CheckAdmin'],
	function ()
{
	Route::get("view_all_subjects","Admin\SubjectsController@view_all_subjects")->name('view_all_subjects');
	Route::get("view_insert_subjects","Admin\SubjectsController@view_insert_subjects")->name('view_insert_subjects');
	Route::post("process_insert_subjects","Admin\SubjectsController@process_insert_subjects")->name('process_insert_subjects');

	Route::get("view_update_subjects/{subjects_id}","Admin\SubjectsController@view_update_subjects")->name('view_update_subjects');
	Route::post("process_update_subjects/{subjects_id}","Admin\SubjectsController@process_update_subjects")->name('process_update_subjects');
});

Route::group(['prefix'=>'students','middleware' => 'CheckAdmin'],
	function ()
{
	Route::get("view_all_students","Admin\StudentsController@view_all_students")->name('view_all_students');
	Route::get("view_students_score/{students_id}","Admin\StudentsController@view_students_score")->name('view_students_score');
	Route::get("view_insert_students","Admin\StudentsController@view_insert_students")->name('view_insert_students');
	Route::post("process_insert_students","Admin\StudentsController@process_insert_students")->name('process_insert_students');

	Route::get("view_update_students/{students_id}","Admin\StudentsController@view_update_students")->name('view_update_students');
	Route::post("process_update_students/{students_id}","Admin\StudentsController@process_update_students")->name('process_update_students');
});

Route::group(['prefix'=>'teacher','middleware' => 'CheckAdmin'],
	function ()
{
	Route::get("view_all_teacher","Admin\TeacherController@view_all_teacher")->name('view_all_teacher');
	Route::get("view_insert_teacher","Admin\TeacherController@view_insert_teacher")->name('view_insert_teacher');
	Route::post("process_insert_teacher","Admin\TeacherController@process_insert_teacher")->name('process_insert_teacher');

	Route::get("view_update_teacher/{teacher_id}","Admin\TeacherController@view_update_teacher")->name('view_update_teacher');
	Route::post("process_update_teacher/{teacher_id}","Admin\TeacherController@process_update_teacher")->name('process_update_teacher');
});

Route::group(['prefix'=>'score','middleware' => 'CheckLogin'],
	function ()
{
	Route::get("view_score_classes_subjects","Admin\ScoreController@view_score_classes_subjects")->name('view_score_classes_subjects');
	Route::get("select_classes_subjects","Admin\ScoreController@select_classes_subjects")->name('select_classes_subjects');
	 // Route::post("view_score_classes_subjects","Admin\ScoreController@view_score_classes_subjects")->name('view_score_classes_subjects');
	Route::post("process_score","Admin\ScoreController@process_score")->name('process_score');
});









