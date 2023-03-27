<?php


namespace app\admin\validate;


use think\Validate;

class AdminUser extends Validate
{
    //登录参数不能为空
    protected $rule = [
        'username'     =>   'require',
        'password'     =>   'require',
        'captcha'      =>   'require|checkCapcha',
    ];
    protected $message = [
        'username'     =>   '用户名必须',
        'password'     =>   '密码必须',
        'captcha'      =>   '验证码必须',
    ];
    //验证码中验证是否正确
    protected function checkCapcha($value,$rule,$data=[]){
        if(!captcha_check($value)){
            return '输入的验证码不正确';
        }
        return true;
    }
}