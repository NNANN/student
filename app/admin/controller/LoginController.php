<?php
namespace app\admin\controller;
use les\core\Controller;
use les\view\View;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use system\model\Admin;

class LoginController  extends Controller {
    public function index(){
//        p($_POST);
        if(IS_POST){
            $admin_password = md5($_POST["admin_password"]);
//            echo $admin_password;
//            $where = " admin_name='{$_POST["admin_name"]}'"." and admin_password=".$admin_password;
            $where = " admin_name='{$_POST["admin_name"]}' and admin_password='{$admin_password}'";
            $res = Admin::where($where)->first();
//            p($res);
            //判断用户名和密码是否正确
            if(!$res){
//                p($res) ;die;
                return $this->setRedirect()->message("用户名或密码不正确");
            }
            //判断验证码是否正确
            if($_SESSION['captcha'] != strtolower ($_POST['captcha'])){
                return $this->setRedirect()->message("验证码不正确");
            }
            //登录成功，将信息存到session
            $_SESSION["admin_name"] = $_POST["admin_name"];
//            echo $_SESSION["amdin_name"];die;
//            p($_SESSION);die;
            return $this->setRedirect("?s=admin/index/index")->message("登陆成功");
        }

        return View::make();
    }

    /**
     * 验证码
     */
    public  function captcha(){
        $phraseBuilder = new PhraseBuilder(1, '0');
        $builder = new CaptchaBuilder(null,$phraseBuilder);
        $builder->build($width=200,$height=32);
        header('Content-type: image/jpeg');
        $builder->output();
        $_SESSION['captcha'] = strtolower ($builder->getPhrase());
    }

    /**
     * 登出
     */
    public function out(){
        session_unset ();
        session_destroy ();
        header ('location:?s=admin/login/index');exit;
    }
}