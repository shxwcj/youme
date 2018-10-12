<?php
namespace app\index\controller;
use think\Controller;
class Base extends Controller
{
    //控制器初始化
    public function _initialize()
    {
        $this->nav();
    }
    //获取栏目导航
    public function nav()
    {
        $navres=\think\Db::name('cate')->order('id asc')->select();
        $this->assign('navres',$navres);
    }
}

