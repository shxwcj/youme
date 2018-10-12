<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/30
 * Time: 22:06
 */

namespace app\index\controller;
class Tags extends Base
{
    public function tags()
    {
        $cates=\think\Db::name('cate')->field('catename')->find(input('cateid'));
        $catename=$cates['catename'];
        $tags=input('tags');
        $map['a.keywords']  = ['like','%'.$tags.'%'];
        $artres=\think\Db::name('article')->alias('a')->join('cate c ','c.id= a.cateid','LEFT')->field('a.id,a.title,a.pic,a.time,a.desc,a.click,a.keywords,c.catename')->order('a.id desc')->where($map)->paginate(2);
        $this->assign('artres', $artres);
        $this->assign('catename', $catename);
        return $this->fetch();
    }
}