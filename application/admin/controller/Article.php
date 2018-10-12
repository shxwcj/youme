<?php
namespace app\admin\controller;
use think\Controller;
class Article extends Base
{
    public function article()
    {
        $artres=\think\Db::name('article')->alias('a')->join('cate c','c.id=a.cateid','LEFT')->field('a.id,a.title,a.pic,a.click,a.time,c.catename')->paginate(3);
       // var_dump($artres);die;
        $this->assign('artres',$artres);
        return $this->fetch();
    }
    public function add()
    {
    if(request()->isPost())
    {
        $data=
            [
                'title'=>input('title'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),
                'time'=>time(),
            ];
        if ($_FILES['pic']['tmp_name'])
        {
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('pic');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file)
            {
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info)
                {
                    // 成功上传后 获取上传信息
                    $data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    // 输出 jpg.
                   // echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                   // echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    //echo $info->getFilename();
                }
                else
                {
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }
        }
        $validate=\think\Loader::validate('Article');
        if ($validate->check($data)) {
            $db = \think\Db::name('Article')->insert($data);
            if ($db) {
                return $this->success('添加文章成功', "admin/Article/article");
            } else {
                $this->error('添加文章失败');
            }
        }
        else
        {
            return $this->error($validate->getError());
        }
        return;
    }
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

    public function edit()
    {
        if(request()->isPost())
        {
            $data=
                [
                    'id'=>$_POST['id'],
                    'title'=>input('title'),
                    'keywords'=>input('keywords'),
                    'desc'=>input('desc'),
                    'cateid'=>input('cateid'),
                    'content'=>input('content'),
                ];
           //var_dump($data['id']);die();
            if ($_FILES['pic']['tmp_name'])
            {
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('pic');
                // 移动到框架应用根目录/public/uploads/ 目录下
                if($file)
                {
                    $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                    if($info)
                    {
                        // 成功上传后 获取上传信息
                        $data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                        // 输出 jpg.
                        // echo $info->getExtension();
                        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                        // echo $info->getSaveName();
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        //echo $info->getFilename();
                    }
                    else
                    {
                        // 上传失败获取错误信息
                        return $this->error($file->getError());
                    }
                }
            }
            $validate=\think\Loader::validate('Article');
            if ($validate->check($data)) {
                $db = \think\Db::name('Article')->update($data);
                if ($db) {
                    return $this->success('修改文章成功', "admin/Article/article");
                } else {
                    echo \think\Db::name('Article')->getLastSql();die();
                    $this->error('修改文章失败');
                }
            }
            else
            {
                return $this->error($validate->getError());
            }
            return;
        }
        $arts=\think\Db::name('Article')->find(input('id'));
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        $this->assign('arts',$arts);
        return $this->fetch();
    }

    public function del()
    {
        $id=input('id');
        if (db('article')->delete($id))
        {
            return $this->success('删除文章成功',"admin/Article/article");
        }
        else
        {
            return $this->error('删除文章失败');
        }
    }


}
