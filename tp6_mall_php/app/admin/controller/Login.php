<?php


namespace app\admin\controller;



use app\common\model\mysql\AdminUser;
use think\facade\View;

class login extends AdminBase
{
    public function initialize()
    {
        if($this->isLogin()){
            return $this->redirect(url('index/index'));
        }
    }
    public function index()
    {
        return View::fetch();
    }
    public  function md5()
    {
        halt(session(config('admin.session_admin')));
       //echo md5('admin'.'_singwa_abc');
    }
    public function check()
    {
        if(!$this->request->isPost()){
            return show(config('status.error'),'请求方式错误');
        }
        //获取用户名 密码 验证码
        $username = $this->request->param('username','','trim');
        $password = $this->request->param('password','','trim');
        $captcha = $this->request->param('captcha','','trim');
        //检验用户名 密码 验证码是否正确
        $data = [
            'username'     =>   $username,
            'password'     =>   $password,
            'captcha'      =>   $captcha,
        ];
        $validate = new \app\admin\validate\AdminUser();
        if(!$validate->check($data)){
            return show(config('status.error'),$validate->getError());
        }
//        if(empty($username) || empty($password) || empty($captcha)){
//            return show(config('status.error'),'参数不能为空');
//        }
        //需要检验验证码是否正确
//        if(!captcha_check($captcha)){
//            return show(config('status.error'),'验证码错误');
//        }
        try {
            $adminUserObj = new \app\admin\business\AdminUser();
            $result = $adminUserObj->login($data);
        }catch (\Exception $e){
            return show(config('status.error'),$e->getMessage());
        }
        if($result){
            return show(config('status.success'),'登陆成功');
        }
        return show(config('status.error'),$validate->getError());

    }
}