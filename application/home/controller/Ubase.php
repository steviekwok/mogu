<?php

namespace app\home\controller;

use app\home\model\User as userModel;
use think\facade\View;

class Ubase extends Base
{
    public function initialize() {
        if(session('mobile') == null) {
            $this->redirect('/user/login');
        }
        $userModel = new userModel;
        $img_url = $userModel->getImg(session('mobile'));
        View::share('img_url', $img_url);
        View::share('mobile', session('mobile'));
        parent::initialize();
    }
}
