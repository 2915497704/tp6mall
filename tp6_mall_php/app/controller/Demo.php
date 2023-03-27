<?php


namespace app\controller;


use app\BaseController;
use think\facade\Request;

class Demo extends BaseController
{
//    protected $requset;
//    public function __construct(Request $request)
//    {
//        $this->requset = $request;
//    }
//
//    public function index()
//    {
//        dump( $this->requset->param('adc'));
//    }
//      public function request()
//      {
//          dump($this->request->param('adc'));
//      }
        public function index()
        {
            dump(Request::param('adc'));
        }
}