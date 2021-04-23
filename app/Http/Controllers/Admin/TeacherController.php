<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\TeacherModel;
/**
 * 
 */
class TeacherController extends Controller 
{
	
	function view_all_teacher(){
		$array=TeacherModel::get_all();
		return view('admin.teacher.view_all',compact('array'));
	}
	function view_insert_teacher()
	{
		return view('admin.teacher.view_insert');
	}
	function process_insert_teacher(Request $rq)
	{
		$teacher=new TeacherModel();
		$teacher->teacher_name=$rq->get('teacher_name');
		$teacher->gender=$rq->get('gender');
		$teacher->email=$rq->get('email');
		$teacher->password=$rq->get('password');
		$teacher->insert();
		return redirect()->route('view_all_teacher');
	}
	
	function view_update_teacher($teacher_id)
	{
		$each=TeacherModel::get_teacher_by_id($teacher_id);
		// print_r($each);
		return view('admin.teacher.view_update',compact('each'));
	}
	function process_update_teacher($teacher_id,Request $rq)
	{
		$teacher=new TeacherModel();
		$teacher->teacher_id=$teacher_id;
		$teacher->teacher_name=$rq->get('teacher_name');
		$teacher->gender=$rq->get('gender');
		$teacher->email=$rq->get('email');
		$teacher->password=$rq->get('password');
		$teacher->update();
		return redirect()->route('view_all_teacher');
	}
	// function login()
 //    {
 //        return view('teacher.login');
 //    }
 //    public function process_login(Request $rq)
 //    {
 //        $teacher=new TeacherModel();
 //        $teacher->email=$rq->get('email');
 //        $teacher->password=$rq->get('password');
 //        dd($teacher); 
 //        $array=$teacher->get_one();
 //        if (count($array)==1) {
 //            $rq->session()->put('teacher_id',$array[0]->teacher_id);
 //            $rq->session()->put('teacher_name',$array[0]->teacher_name);
 //            $rq->session()->put('role','0');
 //            return redirect()->route('view_score_classes_subjects')->with('success','success login');
 //        }
 //        else {
 //            return redirect()->route('view_login_teacher')->with('error','wrong login');
 //        }
 //    }

}