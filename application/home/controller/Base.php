<?php

namespace app\home\controller;

use think\Controller;
use app\admin\model\System as sysModel;
use think\facade\View;
use app\home\model\Image as imageModel;

class Base extends Controller
{
    public function initialize()
    {
        $sysModel = new sysModel();
        $sys = $sysModel->getSys();
        $imgModel = new imageModel();
        $logo = $imgModel->getLogo();
        $this->assign('logo',$logo['img_url']);
        View::share('sys', $sys);
    }
}
