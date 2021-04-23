<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\SubjectsModel;
use App\Model\ClassesModel;
use App\Model\StudentsModel;
use App\Model\ScoreModel;

/**
 * 
 */
class ScoreController extends Controller 
{
	
	public function select_classes_subjects()
	{
		$array_subjects=SubjectsModel::get_all();
		$array_classes=ClassesModel::get_all();
		return view('admin.score.select_classes_subjects',compact('array_subjects','array_classes'));
	}
	public function view_score_classes_subjects(Request $rq)
	{
		$array_subjects=SubjectsModel::get_all();
		$array_classes=ClassesModel::get_all();

		$classes_id=$rq->get('classes_id');
		$subjects_id=$rq->get('subjects_id');
		$array_students=StudentsModel::get_by_classes_id($classes_id);

		$array_score=[];
		foreach($array_students as $students){
			$students_id=$students->students_id;
			$score=ScoreModel::get_by_students_id($students_id,$subjects_id);
			if(count($score)>0){
				$array_score[$students_id]=$score[0]->score;
			}
			else{
				$array_score[$students_id]='';
			}
		}


		return view('admin.score.view_score_classes_subject',compact('array_subjects','array_classes','classes_id','subjects_id','array_students','array_score'));
	}
	public function process_score(Request $rq)
	{
		$object_score = new ScoreModel();

		$object_score->subjects_id=$rq->get('subjects_id');
		$array_score = array();
		$array_score = $rq->get('array_score');
		foreach ($array_score as $students_id => $score) {
			$object_score->students_id = $students_id;
			$object_score->score = $score;
			$get_score = $object_score->get_by_students_id($object_score->students_id,$object_score->subjects_id);
			if(count($get_score) == 0){
				$object_score->insert();
			}
			else{
				$object_score->update();
			}
			// $object_score->insert();
		}
		return redirect()->back();
	}

}