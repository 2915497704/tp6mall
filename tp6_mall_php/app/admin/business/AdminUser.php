<?php


namespace app\admin\business;

use app\common\model\mysql\AdminUser as AdminUserMondel;
use think\Exception;

class AdminUser
{
    public $adminUser = null;
    public function __construct()
    {
        $this->adminUser = new AdminUserMondel();
    }
    public function login($data)
    {
            //检验用户名是否正确
            $adminUser = $this->getAdminUsernameByUsername($data['username']);
            if(!$adminUser){
                throw new Exception('不存在该用户名');
            }
            //检验密码是否正确，默认的密码是123456需要改成admin
            if ($adminUser['password'] != md5($data['password'].'_singwa_abc')) {
//                return show(config('status.error'), '密码错误');
                throw new Exception('密码错误');
            }
            //需要记录信息到mysql表中
            $updateData = [
                //注意字母大小写，否则数据库无法更新
                'last_login_time' => time(),
                'last_login_ip' => request()->ip(),
                'update_time'   =>  time(),
            ];
            $res =  $this->adminUser->updateById($adminUser['id'], $updateData);
            if (empty($res)) {
                //return show(config('status.success'), '登陆失败');
                throw new Exception('登陆失败');
            }
        //记录session
         session(config('admin.session_admin'), $adminUser);
        return true;
    }
    //根据用户名获取需要的功能
    public function getAdminUsernameByUsername($username)
    {
        $adminUser = $this->adminUser->getAdminUsernameByUsername($username);
        if (empty($adminUser) || $adminUser->status != config('status.mysql.table_normal')) {
            //return show(config('status.error'), '用户名输入错误');
            return [];
        }
        $adminUser = $adminUser->toArray();
        return $adminUser;
    }
}