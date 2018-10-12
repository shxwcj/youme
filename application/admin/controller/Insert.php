<?php
namespace app\admin\controller;

use think\Controller;
class Insert extends Base
{
    public function insert()
    {
        return $this->fetch();
    }
}
