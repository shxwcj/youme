<?php
namespace app\index\controller;
use think\Controller;
class Index extends Base
{
    public function index()
    {
        $cates=\think\Db::name('cate')->field('catename')->find(input('cateid'));
        $catename=$cates['catename'];
        $artres=\think\Db::name('article')->alias('a')->join('cate c ','c.id= a.cateid','LEFT')->field('a.id,a.title,a.pic,a.time,a.desc,a.click,a.keywords,c.catename')->order('a.id desc')->paginate(2);
        $this->assign('artres', $artres);
        $this->assign('catename', $catename);
        return $this->fetch();
    }
}
