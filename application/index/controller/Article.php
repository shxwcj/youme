<?php
namespace app\index\controller;
use think\Controller;
class Article extends Base
{
    public function article()
    {
        $id=input('artid');
        //var_dump($id);exit();
        db('article')->where('id',$id)->setInc('click');
        $arts=\think\Db::name('article')->alias('a')->join('cate c ','c.id= a.cateid','LEFT')->field('a.keywords,a.title,a.content,a.time,a.click,a.id,a.cateid,c.catename')->find($id);
       // var_dump( $arts);die();
        $prev=\think\Db::name('article')->where('cateid','=', $arts['cateid'])->where('id','<', $id)->order('id desc')->limit(1)->value('id');
        $next=\think\Db::name('article')->where('cateid','=', $arts['cateid'])->where('id','>', $id)->order('id asc')->limit(1)->value('id');
        $relateres=$this->relate($arts['keywords']);
        //var_dump($relateres);die();
        $this->assign('arts',$arts);
        $this->assign('prev',$prev);
        $this->assign('next',$next);
        $this->assign('relateres',$relateres);
        return $this->fetch();
    }
    //查询相关关键词
    public function relate($keywords)
    {
       // var_dump($keywords);die();
        $arr=explode(',',$keywords);
        //var_dump($arr);die();
        static $relateres=array();
        foreach ( $arr as$k=>$v)
        {
            $map['keywords']  = ['like','%'.$v.'%'];
            $artres=\think\Db::name('article')->order('id desc')->where($map)->limit(10)->field('id,title,time')->select();
            $relateres=array_merge($relateres,$artres);
            //$relateres=array_unique($relateres);//只能对一维数组去除 不能对二维数组去除
            $relateres=arr_unique($relateres);
        }
        return $relateres;
    }
}
