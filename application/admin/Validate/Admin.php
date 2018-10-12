<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    protected $rule =
    [
        'username'  =>  'require|max:25|unique:admin',
        'password'  =>  'require|min:5|alphaNum',
    ];
    protected $message  =
    [
        'username.require' => '管理员名称不能为空',
        'username.unique' => '管理员名称不能重复',
        'username.max' => '管理员名称不能超过25',
        'password.require' => '密码不能为空',
        'password.min' => '密码不能少于五位数',
        'password.alphaNum' => '密码只能是字母和数字',
    ];
  /*  protected $scene = [
        'edit'  =>  ['catename'],
    ];*/

}