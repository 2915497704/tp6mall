<?php


namespace app\admin\controller;



use app\common\model\mysql\AdminUser;
use think\facade\View;

class Index extends AdminBase
{
    public function index()
    {
//        return redirect(url('login/index'));
        return View::fetch();
    }
    public function welcome()
    {
        return View::fetch();

    }

}