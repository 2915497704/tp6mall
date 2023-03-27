<?php


namespace app\demo\excaption;

use think\exception\Handle;
use think\Response;
use Throwable;
class Http extends Handle
{
    public $httpStatus = 500;
    public function render($request, Throwable $e): Response
    {
        if(method_exists($e,'getStatusCode')){
            $httpStatus = $e -> getStatusCode();
        }else{
            $httpStatus = $this->httpStatus;
        }
        // 添加自定义异常处理机制
        return show(config('status.error'),$e->getMessage(),[],$httpStatus);
        // 其他错误交给系统处理
        //return parent::render($request, $e);
    }
}