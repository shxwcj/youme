<?php
//处理传递过来的二维数组
function arr_unique($arr2D)
{
    foreach ($arr2D as $v)
    {
        //拆分一唯数组
        $v=join(',',$v);
        $temp[]=$v;
    }
    //var_dump($temp);die();
    //去除重复
    $temp=array_unique($temp);
    //[0]=> string(23) "17,醉千年,1537284668"
    foreach($temp as $k=>$v)    //一维数组
    {
        $temp[$k]=explode(',',$v);      //分成二维数组
    }
    return $temp;
}