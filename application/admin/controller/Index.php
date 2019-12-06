<?php
namespace app\admin\controller;
use app\admin\controller\Base;//不写也行，默认在当前空间下找

class Index extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }
}
