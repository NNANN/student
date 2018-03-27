<?php

namespace app\admin\controller;

use les\view\View;
use system\model\Grade;

class GradeController extends CommonController
{
    public function index()
    {
        //接受查询后的结果
        $data = Grade::orderBy("grade_id")->get();
//        p($data);die;
        //传递参数并加载模板页面
        return View::with(compact('data'))->make();
    }

    /**
     * 添加
     * @return $this
     */
    public function add(){
        if(IS_POST){
//            p($_POST);
            //将数据插入到Grade表中
            $res = Grade::insert($_POST);
            if($res){
                //消息提醒，并跳转页面
                return $this->setRedirect("?s=admin/grade/index")->message("添加成功");
            }
        }
        return View::make();
    }

    public function edit(){
//        p($_GET);die;
        //将获取的主键 复制给
        $data = Grade::find($_GET["id"]);

        if($_POST){
//            p($_POST);die;
            $where = Grade::getPriKey()."=".$_GET["id"];
//            p($where);die;
            $res = Grade::where($where)->update($_POST);
            if($res){
                return $this->setRedirect("?s=admin/grade/index")->message("修改成功");
            }
        }
//        p($data);die;
        return View::with(compact('data'))->make();
    }

    public function del(){
//        p($_POST);die;
        if(IS_AJAX){
            $where = Grade::getPriKey()."=".$_POST["id"];
//            p($_POST);die;
            $res = Grade::where($where)->del();
            if($res){
                return 1;
            }
        }
    }
}