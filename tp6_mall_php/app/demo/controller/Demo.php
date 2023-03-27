<?php


namespace app\demo\controller;


use app\BaseController;
use app\common\business\User;


class Demo extends BaseController
{
    public function index()
    {
        $value = $this->request->param('status','1','intval');
        if(empty($value)){
            return show(config('status.success','数据错误'));
        }
        $demo = new User();
        $results = $demo->getDataUserstatus($value);
        return show(config('status.success'),'ok',$results);
    }
}