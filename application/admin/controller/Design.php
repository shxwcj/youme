<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use think\Request;

class Design extends Base
{
    public function design()
    {
       $cateres=\think\Db::name('cate')->paginate(3);
       $this->assign('cateres',$cateres);
        return $this->fetch();
    }
    public function add()
    {
       if (request()->isPost())
       {
           $data=[
                'catename'=>input('catename'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'type'=>input('type') ? input('type') : 0,
           ];
           $validate=\think\Loader::validate('Design');
            if ($validate->check($data))
            {
                $db=\think\Db::name('cate')->insert($data);
                    if ($db)
                    {
                        return $this->success('添加栏目成功', "admin/Design/design");
                    }
                    else
                    {
                        $this->error('添加栏目失败', '');
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
        if (db('cate')->delete($id))
        {
          return $this->success('删除栏目成功',"admin/Design/design");
        }
        else
        {
            return $this->error('删除栏目失败');
        }

    }
    public function edit()
    {
        if (request()->isPost())
        {
            $data =  Request::instance()->post();
            $validate=\think\Loader::validate('Design');
            if ($validate->scene('edit')->check($data))
            {
                if ($db = db('cate')->update($data))
                {
                    return $this->success('修改栏目成功', 'admin/Design/design');
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
        $cates=db('cate')->where('id',$id)->find();
        $this->assign('cates',$cates);
        return $this->fetch();
    }


}
