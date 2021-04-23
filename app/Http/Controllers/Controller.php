<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\AdminModel;
use App\Model\TeacherModel;
class Controller extends BaseController
{
    use AuthorizesRequests,DispatchesJobs,ValidatesRequests;
    
    function demo()
    {
    	return view('layer.master');
    }
    
    function login()
    {
        return view('admin.login.login');
    }
    function login_teacher()
    {
        return view('teacher.login');
    }
    public function process_login(Request $rq)
    {
        $admin=new AdminModel();
        $admin->email=$rq->get('email');
        $admin->password=$rq->get('password');
        $array=$admin->get_one();
        if (count($array)==1) {
            $rq->session()->put('admin_id',$array[0]->admin_id);
            $rq->session()->put('admin_name',$array[0]->admin_name);
            $rq->session()->put('admin_level',$array[0]->level);
            return redirect()->route('view_all_classes')->with('success','success login');
        }
        else {
            return redirect()->route('view_login_admin')->with('error','wrong login');
        }
    }
    public function process_login_teacher(Request $rq)
    {
        $teacher=new TeacherModel();
        $teacher->email=$rq->get('email');
        $teacher->password=$rq->get('password');
        $array=$teacher->get_one($teacher->email);
        if (count($array)==1) {
            $rq->session()->put('teacher_id',$array[0]->teacher_id);
            $rq->session()->put('teacher_name',$array[0]->teacher_name);
            $rq->session()->put('teacher_level',$array[0]->level);
            return redirect()->route('view_score_classes_subjects')->with('success','success login');
        }
        else {
            return redirect()->route('view_login_teacher')->with('error','wrong login');
        }
    }
    function logout(Request $rq)
    {
        
        $rq->session()->flush();
        return redirect()->route('view_login_admin')->with('success','logout success');
    }
    function logout_teacher(Request $rq)
    {
        
        $rq->session()->flush();
        return redirect()->route('view_login_teacher')->with('success','logout success');
    }
}
