<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    protected $rule =
    [
        'title'  =>  'require|max:100|unique:article',
        'desc'  =>  'require|max:100',
        'content'  =>  'require|min:10',
        'cateid'  =>  'require',
        'keywords'  =>  'require',
    ];
    protected $message  =
    [
        'title.require' => '标题不能为空',
        'title.unique' => '标题不能重复',
        'title.max' => '标题不能超过100',
        'desc.require' => '描述不能超过100',
        'content.require' => '内容不能少于10',
        'cateid.require' => '所属栏目不能为空',
        'keywords.require' => '栏目关键字不能为空',
    ];

}