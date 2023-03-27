<?php


namespace app\demo\controller;


use app\BaseController;

class Index extends BaseController
{
    public function hello()
    {
        $a = 123;
        dump($a);
    }
    public function index()
    {
        dump($this->request->type);
    }
}