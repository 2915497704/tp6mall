<?php


namespace app\controller;


class Error
{
    public function __call($name,$arguments)
    {
        return show('0','方法不存在',null);
    }
}