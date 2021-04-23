<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\ClassesModel;
use Session;
/**
 * 
 */
class ClassesController extends Controller 
{
	function view_all_classes(){
		$array=ClassesModel::get_all();
		return view('admin.classes.view_all',compact('array'));
	}
	
	function view_insert_classes()
	{
		return view('admin.classes.view_insert');
	}
	function process_insert_classes(Request $rq)
	{
		$classes= new ClassesModel();
		$classes->classes_name=$rq->get('classes_name');
		$classes->insert();
		return redirect()->route('view_all_classes');
	}
	
	function view_update_classes($classes_id)
	{
		$each=ClassesModel::get_one($classes_id);
		return view('admin.classes.view_update',compact('each'));
	}
	function process_update_classes($classes_id,Request $rq)
	{
		$classes=new ClassesModel();
		$classes->classes_id=$classes_id;
		$classes->classes_name=$rq->get('classes_name');
		$classes->update();
		return redirect()->route('view_all_classes');
	}

}