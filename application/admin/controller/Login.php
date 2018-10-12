<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Login as Log;
class Login extends Controller
{
    public function login()
    {
      if (request()->isPost())
      {
          $login=new Log;
          $status=$login->login(input('username'),md5(input('password')));
          if ($status==1)
          {
            return $this->success('登录成功',"admin/Index/index");
          }
          elseif($status==2)
          {
            return $this->error('账号或密码错误');
          }
          else
          {
              return $this->error('用户不存在');
          }
      }
        return $this->fetch();
    }
    public function logout()
    {
        // 清除session（当前作用域）
       session(null);
      return $this->success('退出成功','admin/Login/login');
    }

}
