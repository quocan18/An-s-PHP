<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\SubjectsModel;



/**
 * 
 */
class SubjectsController extends Controller 
{
	function view_all_subjects(){
		$array=SubjectsModel::get_all();
		return view('admin.subjects.view_all',compact('array'));
	}
	function view_insert_subjects()
	{
		
		return view('admin.subjects.view_insert');
	}
	function process_insert_subjects(Request $rq)
	{
		$subjects=new SubjectsModel();
		$subjects->subjects_name=$rq->get('subjects_name');
		$subjects->desrciption=$rq->get('description');
		// dd($subjects);
		$subjects->insert();
		return redirect()->route('view_all_subjects');
	}
	function view_update_subjects($subjects_id)
	{
		$each=SubjectsModel::get_one($subjects_id);
		return view('admin.subjects.view_update',compact('each'));
	}
	function process_update_subjects($subjects_id,Request $rq)
	{
		$subjects=new SubjectsModel();
		$subjects->subjects_name=$rq->get('subjects_name');
		$subjects->desrciption=$rq->get('desrciption');
		$subjects->subjects_id=$subjects_id;
		// dd($subjects);
		$subjects->update();
		return redirect()->route('view_all_subjects');
	}
}
