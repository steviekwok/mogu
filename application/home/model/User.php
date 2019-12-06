<?php

namespace app\home\model;

use think\Model;

class User extends Model
{
    public function insertUser($data) {
        return $this->insert($data);
    }

    public function checkUser($mobile) {
        return $this->where('mobile', $mobile)->find();
    }

    public function toLogin($mobile, $pwd) {
        $user = $this->where('mobile', $mobile)->find();
        if($user) {
            if($user['is_froze']) {
                return ['status' => 'fail', 'msg' => '用户已被冻结，禁止登录'];
            }
            if ($user['password'] == md5($pwd . $user['salt'])) {
                return ['status' => 'success', 'msg' => '登陆成功'];
            }else{
                return ['status' => 'fail', 'msg' => '密码错误'];
            }
        } else {
            return ['status' => 'fail', 'msg' => '用户名不存在'];
        }
    }

    public function updateImg($mobile, $img_url) {
        return $this->where('mobile', $mobile)->update(['img_url'=>$img_url]);
    }

    public function getImg($mobile) {
        return $this->where('mobile', $mobile)->value('img_url');
    }

    public function getUserId($mobile) {
        return $this->where('mobile', $mobile)->value('id');
    }
}
