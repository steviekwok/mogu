<?php

namespace app\home\controller;

use think\Request;
use app\home\model\User as userModel;

class Pic extends Ubase
{
    public function index(){
        return $this->fetch('index');
    }

    public function upload(Request $request) {
        //dump($request->param());
        $file = $request->file('file');
        $res = $file->validate(config('VALIDATE'))->move(config('USER_PATH'));
        if($res) {
            $file_path = $res->getPathname();
            return json(['status'=>'success','msg'=>$file_path]);
        }else {
            return json(['status'=>'fail','msg'=>$file->getError()]);
        }
    }

    public function update(Request $request) {
        $img_url = $request->param('img_url');
        $mobile = session('mobile');
        $userModel = new userModel;
        $res = $userModel->updateImg($mobile, $img_url);
        if($res) {
            return json(['status'=>'success']);
        }else{
            return json(['status'=>'fail']);
        }
    }
}
