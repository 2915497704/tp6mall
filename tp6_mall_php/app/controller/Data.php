<?php


namespace app\controller;


use app\model\User;
use think\facade\Db;

class Data
{
    public function index()
    {
        $value =  Db::name('user')->whereBetween('id',[10,50])->select();
        return $value;
    }
    public function data()
    {
       $modelObj = new User();
       $value = $modelObj->where('id','between',[10,30])
           ->select();
        //return json($value);
        foreach ($value as $value){
            echo $value->username;
        }
    }
}