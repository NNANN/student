<?php
namespace app\admin\controller;
use les\view\View;

class IndexController extends CommonController {
    public  function index(){
        return View::make();
    }
}