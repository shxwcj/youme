<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/30
 * Time: 22:06
 */

namespace app\index\controller;
use think\Controller;
class Search extends Base
{
    public function search()
    {
        $keywords=input('keywords');
        if($keywords)
        {
            $map['title']  = ['like','%'.$keywords.'%'];
            $seares=\think\Db::name('article')->where($map)->order('id desc')->paginate(2);
            $this->assign('seares',$seares);
            $this->assign('keywords',$keywords);
        }
        else
        {
            $this->assign('seares','');
            $this->assign('keywords','没有关键词');
        }
       // var_dump($seares);die();
        return $this->fetch();
    }
}