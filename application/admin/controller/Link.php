<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use think\Request;

class Link extends Base
{
    public function link()
    {
       $linkres=\think\Db::name('link')->paginate(3);
       $this->assign('linkres',$linkres);
        return $this->fetch();
    }
    public function add()
    {
       if (request()->isPost())
       {
           $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),
           ];
           $validate=\think\Loader::validate('Link');
            if ($validate->check($data))
            {
                $db=\think\Db::name('link')->insert($data);
                    if ($db)
                    {
                        return $this->success('添加链接成功', "admin/Link/link");
                    }
                    else
                    {
                        $this->error('添加链接失败', '');
                    }
            }
            else
            {
                return $this->error($validate->getError());
            }
           return;
       }

        return $this->fetch();
    }

    public function del()
    {
        $id=input('id');
        if (db('link')->delete($id))
        {
          return $this->success('删除链接成功',"admin/Link/link");
        }
        else
        {
            return $this->error('删除链接失败');
        }

    }
    public function edit()
    {
        if (request()->isPost())
        {
            $data =  Request::instance()->post();
            $validate=\think\Loader::validate('Link');
            if ($validate->check($data))
            {
                if ($db = db('link')->update($data))
                {
                    return $this->success('修改栏目成功', 'admin/Link/link');
                }
                else
                {
                    return $this->error('修改栏目失败');
                }
            }
            else
            {
                return $this->error($validate->getError());
            }
            return;
        }
        $id=input('id');
        $links=db('link')->where('id',$id)->find();
        $this->assign('links',$links);
        return $this->fetch();
    }


}
