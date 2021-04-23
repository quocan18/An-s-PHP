<?php
namespace App\Model;
use DB;
/**
 * 
 */
class ScoreModel 

{
	public $students_id;
	public $subjects_id;
	public $score;
	public function insert()
	{
		DB::insert("insert into score(students_id,subjects_id,score) values (?,?,?)",[
			$this->students_id,
			$this->subjects_id,
			$this->score
		]);
	}
	static function get_by_students_id($students_id,$subjects_id){
		$array=DB::select("select score from score where students_id='$students_id' and subjects_id='$subjects_id'");
		return $array;
	}
	public function update()
	{
		DB::update("update score set score =? where students_id=? and subjects_id=?",[
			$this->score,
			$this->students_id,
			$this->subjects_id
		]);
	}
	
}