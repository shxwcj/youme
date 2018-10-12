<?php
namespace app\admin\validate;
use think\Validate;

class Link extends Validate
{
    protected $rule =
    [
        'title'  =>  'require|max:25|unique:link',
        'url'  =>  'require',
    ];
    protected $message  =
    [
        'title.require' => '链接标题不能为空',
        'title.unique' => '链接标题不能重复',
        'title.max' => '链接标题不能超过25',
        'url.require' => '链接地址不能为空',
    ];

}