<?php
namespace app\admin\validate;
use think\Validate;

class Design extends Validate
{
    protected $rule =
    [
        'catename'  =>  'require|max:25|unique:cate',
        'keywords'  =>  'require',
        'desc'  =>  'require|max:1000',
    ];
    protected $message  =
    [
        'catename.require' => '栏目名称不能为空',
        'catename.unique' => '栏目名称不能重复',
        'catename.max' => '栏目名称不能超过25',
        'desc.require' => '内容不能为空',
        'keywords.require' => '栏目关键字不能为空',
    ];
    protected $scene = [
        'edit'  =>  ['catename'],
    ];

}