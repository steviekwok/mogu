<?php

namespace app\home\controller;

use think\Request;
use app\home\model\User as userModel;
use think\Db;

class Address extends Ubase
{
    public function index() {
        $mobile = session('mobile');
        $userModel = new userModel;
        $user_id = $userModel->getUserId($mobile);
        $res = Db::name('address')->where('user_id', $user_id)->order('id desc')->select();
        $this->assign('addresses', $res);
        return $this->fetch();
    }

    public function add(Request $request) {
        $data = $request->param();

        $mobile = session('mobile');
        $userModel = new userModel;
        $data['user_id'] = $userModel->getUserId($mobile);

        $res = Db::name('address')->insert($data);
        if($res) {
            return json(['status'=>'success']);
        }else{
            return json(['status'=>'fail']);
        }
    }

    public function del(Request $request)
    {
        $id = $request->param('id');
        if (!is_numeric($id)) {
            return json(['status' => 'fail']);
        }
        $res = Db::name('address')->where('id', $id)->delete();
        if ($res) {
            return json(['status' => 'success']);
        } else {
            return json(['status' => 'fail']);
        }
    }

}
