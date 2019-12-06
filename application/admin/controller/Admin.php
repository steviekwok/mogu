<?php

namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;
use think\Request;
use think\Validate;
use app\admin\model\Admin as adminModel;

class Admin extends Controller
{
    public function index() {
        return $this->fetch('login');
    }

    public function captcha() {
        $captcha = new Captcha(['length' => 4]);
        return $captcha->entry();
    }

    public function toLogin(Request $request){
        $data = $request->only(['code', '__token__']);
        $rule = ['code|验证码' => 'captcha|token'];
        $validate = new Validate;

        if (!$validate->check($data, $rule)) {
            return json(['status'=>'fail','msg'=>$validate->getError()]);
        }

        $user_name = $request->param('user_name','','trim');
        $password = $request->param('password','','trim');

        $adminModel = new adminModel;
        $res = $adminModel->checkAdmin($user_name,$password);
        if($res['status'] == 'success') {
            session('admin_name',$user_name);
        }

        return json($res);
    }

    public function logout() {
        session('admin_name',null);
        return $this->redirect('/admin/login');
    }
}
