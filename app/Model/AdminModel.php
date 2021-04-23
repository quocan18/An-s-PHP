<?php
namespace App\Model;
use DB;
/**
 * 
 */
class AdminModel 
{
	public $admin_id;
	public $admin_name;
	public $email;
	public $password;
	public function get_one()
	{
		$array=DB::select('select * from admin where email=? and password=?',[
			$this->email,
			$this->password
		]);
		return $array;
	}
}