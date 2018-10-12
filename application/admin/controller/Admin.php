<?php
namespace app\admin\controller;
class Admin extends Base
{
    public function admin()
    {
       $adminres=\think\Db::name('admin')->paginate(3);
       $this->assign('adminres',$adminres);
        return $this->fetch();
    }
    public function add()
    {
       if (request()->isPost())
       {
           $data=[
                'username'=>input('username'),
                'password'=>md5(input('password')),
           ];
           $validate=\think\Loader::validate('Admin');
            if ($validate->check($data))
            {
                $db=\think\Db::name('admin')->insert($data);
                    if ($db)
                    {
                        return $this->success('添加管理员成功', "admin/Admin/admin");
                    }
                    else
                    {
                        $this->error('添加管理员失败', '');
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
        if ($id==1)
        {
            return $this->error('初始化管理员不允许删除');
        }
        if (db('admin')->delete($id))
        {
          return $this->success('删除管理员成功',"admin/Admin/admin");
        }
        else
        {
            return $this->error('删除管理员失败');
        }

    }
    public function edit()
    {
        if (request()->isPost())
        {
            $data =
                [
                    'id'=>$_POST['id'],
                    'username'=>input('username'),
                    'password'=>md5(input('password')),
                ];
            $validate=\think\Loader::validate('Admin');
            if ($validate->scene('edit')->check($data))
            {
                if ($db = db('admin')->update($data))
                {
                    return $this->success('修改管理员成功', 'admin/Admin/admin');
                }
                else
                {
                    return $this->error('修改管理员失败');
                }
            }
            else
            {
                return $this->error($validate->getError());
            }
            return;
        }
        $id=input('id');
        $admins=db('admin')->find($id);
        $this->assign('admins', $admins);
        return $this->fetch();
    }


}
