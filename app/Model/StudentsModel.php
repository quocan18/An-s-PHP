<?php
namespace App\Model;
use DB;

/**
 * 
 */
class StudentsModel 
{
	public $students_id;
	public $students_name;
	public $gender;
	public $date_of_birth;
	public $email;
	public $phone_number;
	public $classes_id;
	public $classes_name;
	static function get_all()
	{
		$array=DB::select('select students.*,classes.classes_name as classes_name from students join classes on classes.classes_id=students.classes_id');
		return $array;
	}
	static function get_by_classes_id($classes_id)
	{
		$array=DB::select("select * from students where classes_id='$classes_id'");
		return $array;
	}
	public function insert()
	{
		DB::insert("insert into students(students_name,gender,date_of_birth,email,phone_number,classes_id) values(?,?,?,?,?,?)",[
				$this->students_name,
				$this->gender,
				$this->date_of_birth,
				$this->email,
				$this->phone_number,
				$this->classes_id
		]);
	}
	static function get_one($students_id){
		$array=DB::select('select * from students where students_id=?',[$students_id]);
		return $array[0];
	}
	public function update(){
		DB::update("update students set 
			students_name=?,
			gender=?,
			date_of_birth=?,
			email=?,
			phone_number=?,
			classes_id=? where students_id=?",
			[
				$this->students_name,
				$this->gender,
				$this->date_of_birth,
				$this->email,
				$this->phone_number,
				$this->classes_id,
				$this->students_id
			]);
	}
	static function get_all_score_by_students_subject($students_id,$subjects_id){
		$array = DB::select('select score.*,subjects.subjects_name from score inner join subjects on score.subjects_id = subjects.subjects_id where score.students_id = ? and score.subjects_id = ?',[
			$students_id,
			$subjects_id
		]);
		return $array;
	}
}