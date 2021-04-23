<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\ClassesModel;
use App\Model\StudentsModel;
use App\Model\SubjectsModel;


/**
 * 
 */
class StudentsController extends Controller 
{
	public function view_all_students()
	{
		$array=StudentsModel::get_all();
		return view('admin.students.view_all',compact('array'));
	}
	function view_insert_students()
	{
		$array_classes=ClassesModel::get_all();
		return view('admin.students.view_insert',compact('array_classes'));
	}
	function process_insert_students(Request $rq)
	{
		$students=new StudentsModel();
		$students->students_name=$rq->get('students_name');
		$students->gender=$rq->get('gender');
		$students->date_of_birth=$rq->get('date_of_birth');
		$students->email=$rq->get('email');
		$students->phone_number=$rq->get('phone_number');
		$students->classes_id=$rq->get('classes_id');
		$students->insert();
		return redirect()->route("view_all_students");
	}
	function view_update_students($students_id)
	{
		$each=StudentsModel::get_one($students_id);
		$array_classes=ClassesModel::get_all();
		return view('admin.students.view_update',compact('each','array_classes'));
	}
	function view_students_score($students_id)
	{
		$array_students = StudentsModel::get_one($students_id);
		// dd($array_students);
		$array = array();
		$array_subjects = SubjectsModel::get_all();
		$array_name_subjects = array();
		foreach ($array_subjects as $each) {
			$subjects_id = $each->subjects_id;
			$array_name_subjects[$subjects_id] = $each->subjects_name;
			$diem = StudentsModel::get_all_score_by_students_subject($students_id,$subjects_id);
			if(count($diem) == 1){
				$array[$subjects_id][$students_id] = $diem[0]->score;
			}
			else{
				$array[$subjects_id][$students_id] = '';
			}
		}
		
		return view('admin.students.view_students_score',compact('array_subjects','array','students_id','array_students','array_name_subjects'));
	}
	function process_update_students($students_id,Request $rq)
	{
		$students=new StudentsModel();
		$students->students_id=$students_id;
		$students->students_name=$rq->get('students_name');
		$students->gender=$rq->get('gender');
		$students->date_of_birth=$rq->get('date_of_birth');
		$students->email=$rq->get('email');
		$students->phone_number=$rq->get('phone_number');
		$students->classes_id=$rq->get('classes_id');
		$students->update();
		return redirect()->route("view_all_students");

	}
}