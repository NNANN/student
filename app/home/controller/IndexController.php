<?php

namespace app\home\controller;

use les\core\Controller;
use les\model\Model;
use les\view\View;
use system\model\Grade;
use system\model\Student;

class IndexController extends Controller
{
    private  $grade = [];
    private  $student = [];
    public function index(){
        $this->grade= Grade::orderBy("grade_id")->get();
        $this->student = Student::orderBy("student_id")->get();
        $grade = $this->grade;
        $student = $this->student;
        return View::with(compact("grade","student"))->make();
    }

    public function serach(){
        if(IS_AJAX){
//            p($_POST);
            $where1 = $_POST["student_name"] ? "student_name="."'{$_POST["student_name"]}'"." " : "";
//            p($where1);
            $where2 = $_POST["grade_id"] ? "grade_id="."{$_POST["grade_id"]}"." " : "";
//            p($where2);
//            p($where1." and " .$where2);
            if(!($where1 && $where2)){
                $where = $where1.$where2;
                $res = Student::where($where)->get();
                echo json_encode($res);
            }else{
                $where = $where1." and ".$where2;
//                p($where);
                $res = Student::where($where)->get();
                echo json_encode($res);
            }
        }
    }

}