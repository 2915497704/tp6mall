<?php


namespace app\demo\controller;




use app\BaseController;
use think\exception\HttpException;

class Text extends BaseController
{
    public function index()
    {
        //echo $adc;
        throw new HttpException(404,"找不到数据");
    }
}