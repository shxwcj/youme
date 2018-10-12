<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    public function _initialize()
    {
       // Session::delete('id');
        if (!session('id'))
        {
            $this->error('请先登录系统','admin/Login/login');
        }
    }
}

