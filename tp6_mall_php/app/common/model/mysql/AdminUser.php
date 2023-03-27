<?php


namespace app\common\model\mysql;


use think\Model;

class AdminUser extends Model
{
    public function getAdminUsernameByUsername($username)
    {
        if(empty($username)){
            return false;
        }
        $where = [
            'username'  => trim($username),
        ];
        $result =  $this->where($where)->find();
        return $result;
    }
    //根据id更新数据表里的数据
    public function updateById($id,$data){
        $id = intval($id);
        if(empty($id) || empty($data) || !is_array($data)) {
            return false;
        }
        $where  = [
            'id'    =>  $id,
        ];
        return $this->where($where)->save($data);
    }
}