<?php

namespace app\admin\controller;

use app\admin\model\User as userModel;
use think\Request;

class User extends Base
{
    public function index() {
        $userModel = new userModel;
        $data = $userModel->getUsers();
        $this->assign('data', $data);
        return $this->fetch('list');
    }

    public function froze(Request $request) {
        $id = $request->param('id');
        $userModel = new userModel;
        $res = $userModel->frozeuser($id);
        if($res) {
            return json(['status'=>'success']);
        }else{
            return json(['status'=>'fail']);
        }
    }
}
