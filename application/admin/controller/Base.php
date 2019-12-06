<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function initialize() {
        if(!session('admin_name')) {
            return $this->redirect('/admin/login');
        }
    }
}
