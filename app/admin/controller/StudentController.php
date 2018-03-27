<?php
namespace app\admin\controller;
use les\view\View;
use system\model\Grade;
use system\model\Student;

class StudentController extends CommonController {
    public static function index(){

//        p($data);die;
        $data = Student::orderBy("student_id")->get();
//        p($res);die;
        return View::with(compact('data'))->make();
    }

    public function edit(){
        $data = Grade::column('grade_name')->orderBy("grade_id")->get();
        $res = Student::find($_GET['id']);
        if(IS_POST){
            $where = Student::getPriKey()."=".$_GET["id"];
//            p($where);die;
//            p($_POST);die;
            $res = Student::where($where)->update($_POST);
            if($res){
                return $this->setRedirect("?s=admin/student/index")->message("修改成功");
            }
        }
//        p($data);die;
//        p($res);die;
        return View::with(compact('data','res'))->make();
    }

    public function add(){
        $data = Grade::orderBy("grade_id")->get();
//        p($data);die;
        if(IS_POST){
//            p($_POST);die;
            //将数据插入到Student表中
            $res = Student::insert($_POST);
            if($res){
                //消息提醒，并跳转页面
                return $this->setRedirect("?s=admin/student/index")->message("添加成功");
            }
        }
        return View::with(compact('data'))->make();
    }

    public function del(){
        if(IS_AJAX){
            $where = Student::getPriKey()."=".$_POST["id"];
//            p($_POST);die;
            $res = Student::where($where)->del();
            if($res){
                return 1;
            }
        }
    }
}