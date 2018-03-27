<?php

namespace app\admin\controller;

use les\core\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
//        进行登录验证
        if (!isset($_SESSION['admin_name'])) {
            echo $this->setRedirect('?s=admin/login/index')->message('请先登录');
            exit;
        }
    }
}