<?php


namespace app\common\model\mysql;


use think\Model;

class User extends Model
{
    public function getDataUserstatus($value,$limit = 10)
    {
        if(empty($value)){
            return [];
        }
        $results = $this->where('status',$value)
            ->limit($limit)
            ->order('id','desc')
            ->select();
        return $results;
    }
}