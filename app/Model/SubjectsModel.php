<?php
namespace App\Model;
use DB;
/**
 * 
 */
class SubjectsModel
{
	public $subjects_id;
	public $subjects_name;
	public $desrciption;
	
	static function get_all()
	{
		$array=DB::select('select * from subjects');
		return $array;
	}
	static function get_one($subjects_id)
	{
		$array=DB::select('select * from subjects where subjects_id=?',[$subjects_id]);
		return $array[0];
	}
	public function update()
	{
		DB::update("update subjects set subjects_name = ?,description=? where subjects_id = ?",[
			$this->subjects_name,
			$this->desrciption,
			$this->subjects_id
		]);
	}
	public function insert(){
		DB::insert("insert into subjects(subjects_name,description) values (?,?)",[
			$this->subjects_name,
			$this->desrciption
		]);
	}
	 
}