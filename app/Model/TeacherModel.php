<?php
namespace App\Model;
use DB;
/**
 * 
 */
class TeacherModel
{
	public $teacher_id;
	public $teacher_name;
	public $gender;
	public $email;
	public $password;
	
	static function get_all()
	{
		$array=DB::select('select * from teacher');
		return $array;
	}
	public function insert()
	{
		DB::insert("insert into teacher(teacher_name,gender,email,password) values(?,?,?,?)",[
				$this->teacher_name,
				$this->gender,
				$this->email,
				$this->password
		]);
	}
	static function get_one($email)
	{
		$array=DB::select('select * from teacher where email=?',[$email]);
		return $array;
	}
	static function get_teacher_by_id($teacher_id)
	{
		$array=DB::select('select * from teacher where teacher_id=?',[$teacher_id]);
		return $array[0];
	}
	public function update()
	{
		DB::update("update teacher set teacher_name=?,gender=?,email=?,password=? where teacher_id=?",[
			$this->teacher_name,
			$this->gender,
			$this->email,
			$this->password,
			
			$this->teacher_id
		]);
	}
}