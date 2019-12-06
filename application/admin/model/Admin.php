<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public function checkAdmin($user_name,$password) {
        $user = $this->where('user_name',$user_name)->find();

        if(!$user) {
            return ['status'=>'fail','msg'=>'用户名不存在'];
        }

        $pw = md5($password . $user['salt']);
        if($pw == $user['password']) {
            return ['status'=>'success','msg'=>'登陆成功'];
        }else{
            return ['status'=>'fail','msg'=>'用户名或密码错误'];
        }
    }
}
