<?php
namespace App\Model;
use DB;
/**
 * 
 */
class ClassesModel
{
	public $classes_id;
	public $classes_name;

	static function get_all()
	{
		$array=DB::select("select * from classes");
		return $array;
	}
	public function insert()
	{
		DB::insert("insert into classes(classes_name) values(?)",[$this->classes_name]);
	}
	static function get_one($classes_id)
	{
		$array=DB::select("select * from classes where classes_id=?",[$classes_id]);
		return $array[0];
	}
	
	public function update()
	{
		DB::update("update classes set classes_name =? where classes_id=?",[
			$this->classes_name,$this->classes_id]);
	}
}