<?php
namespace app\admin\controller;

use think\Controller;
class System extends Base
{
    public function system()
    {
        return $this->fetch();
    }
}
