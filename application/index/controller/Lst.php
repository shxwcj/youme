<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/30
 * Time: 21:43
 */
namespace app\index\controller;
use think\Controller;
class Lst extends Base
{
    public function lst()
    {
        $cates=\think\Db::name('cate')->field('catename')->find(input('cateid'));
        $catename=$cates['catename'];
        $artres=\think\Db::name('article')->order('id desc')->where('cateid','=',input('cateid'))->paginate(2);
        $this->assign('artres', $artres);
        $this->assign('catename', $catename);
        return $this->fetch();
    }
}