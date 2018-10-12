<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Base
{
    public function index()
    {
        //echo \think\Session::get('id');
        return $this->fetch();
    }
}
