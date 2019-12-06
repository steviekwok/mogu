<?php

namespace app\home\controller;

use think\Request;
use think\Db;
use app\home\model\User as userModel;
use app\home\model\Order as orderModel;

class User extends Base
{
    public function orderList(){
        $orderModel = new orderModel;
        $mobile = session('mobile');
        if($mobile == null) {
            $this->redirect('/user/login');
        }
        $userModel = new userModel;
        $user_id = $userModel->getUserId($mobile);
        $orders = $orderModel->getOrders($user_id);
        $img_url = $userModel->getImg(session('mobile'));
        $this->assign('img_url', $img_url);
        $this->assign('mobile', $mobile);
        $this->assign('orders', $orders);
        return $this->fetch('order_list');
    }

    public function queryExp(Request $request) {
        $exp_name = $request->param('exp_name');
        $exp_no = $request->param('exp_no');
        //$url = "http://v.juhe.cn/exp/index?key=".config('exp_AppKey')."&com=" .$exp_name."&no=".$exp_no;
        //$json = file_get_contents($url);
        //file_put_contents('exp.txt', $json);
        $data = json_decode(file_get_contents('exp.txt'),true);
        if($data['error_code'] == 0) {
            $html = '<div class="delivery-detail"><div class="inner"><p>物流公司：'.
                $data['result']['company'].'</p><p>物流单号：'.$data['result']['no'].'</p><ul>';

            foreach($data['result']['list'] as $v){
                $html .= '<li class="newest"><p>'.$v['remark'].'</p><p>'.$v['datetime'].'</p></li>';
            }
            $html .= '</ul></div></div>';

            return json(['status'=>'success','html'=>$html]);
        }
        return json(['status'=>'fail']);
    }

    public function comment($oid){
        $orderModel = new orderModel();
        $orderModel->comfirmRec($oid);
        $order = $orderModel->getOrder($oid);
        $this->assign('order', $order);
        $mobile = session('mobile');
        $this->assign('mobile', $mobile);
        return $this->fetch('comment');
    }

    public function doComment(Request $request) {
        $data = $request->param('','','trim');
        $order_id = $request->param('order_id');
        $mobile = session('mobile');
        $userModel = new userModel;
        $data['user_id'] = $userModel->getUserId($mobile);
        $data['create_time'] = time();
        $res = Db::name('comment')->insert($data);
        if($res) {
            Db::name('order')->where('id', $order_id)->update(['is_comment'=>1]);
            return $this->success('评价成功', '/user/order_list');
        }else {
            return $this->error('评价失败', '/user/order_list');
        }
    }

    public function waitPay(){
        $userModel = new userModel;
        $mobile = session('mobile');
        if($mobile == null) {
            $this->redirect('/user/login');
        }
        $user_id = $userModel->getUserId($mobile);
        $img_url = $userModel->getImg(session('mobile'));

        $nopay_orders = Db::name('order')->where(['user_id'=>$user_id,'pay_status'=>0])->group('trade_no')
                                        ->field('trade_no,sum(fee) total,pay_type ')->select();
        foreach($nopay_orders as $k=>$v) {
            $sub_trade = Db::name('order o')->join('goods g','o.goods_id=g.goods_id')->where('o.trade_no',$v['trade_no'])
                         ->field('o.id,o.goods_id,o.goods_name,o.goods_color_desc,o.goods_type,o.goods_num,
                         o.goods_price,o.fee,o.sub_trade_no,o.create_time,g.goods_img,g.original_price')->select();
            $nopay_orders[$k]['sub_trade'] = $sub_trade;
            $nopay_orders[$k]['info'] = base64_encode($sub_trade[0]['id'].'-'.$sub_trade[0]['goods_name'].
                '-'.$nopay_orders[$k]['trade_no'].'-'.$nopay_orders[$k]['total'].'-'.$nopay_orders[$k]['pay_type']);
        }
        $img_url = $userModel->getImg(session('mobile'));
        $this->assign('img_url', $img_url);
        $this->assign('mobile', $mobile);
        $this->assign('nopay_orders',$nopay_orders);
        return $this->fetch('wait_pay');
    }

    public function pay($info) {
        list($oid,$goods_name,$trade_no,$total,$pay_type) = explode('-',base64_decode($info));
        $new_trade_no = substr($trade_no,0,-5) . mt_rand(10000,99999);//因为曾提交至微信或支付宝支付，订单号在那边已存在，要改一下
        Db::name('order')->where('trade_no', $trade_no)->update(['trade_no'=>$new_trade_no]);
        $res = 0;
        if($pay_type=='wx'){
            //要增添微信和支付宝付款代码
            $res = Db::name('order')->where('trade_no', $new_trade_no)->update(['pay_status'=>1]);
        }else {
            $res = Db::name('order')->where('trade_no', $new_trade_no)->update(['pay_status'=>1]);
        }
        if($res) {
            return $this->success('付款成功', '/user/wait_pay');
        }else {
            return $this->error('付款失败', '/user/wait_pay');
        }
    }

    public function refund($oid){
        $order = (new orderModel)->getOrder($oid);
        $this->assign('order', $order);
        return $this->fetch('refund');
    }

    public function applyRefund(Request $request) {
        $data = $request->param('','','trim');
        $data['mobile'] = session('mobile');
        $data['create_time'] = time();
        $res = Db::name('refund')->insert($data);

        if($res) {
            Db::name('order')->where('id', $data['order_id'])->update(['is_refund'=>1]);
            return $this->success('申请退款完成，等待审核','/user/order_list');
        }else{
            return $this->error('申请退款失败，请联系客服','/user/order_list');
        }
    }

    public function login(Request $request) {
        if($request->isPost()){
            /*$code = $request->param('code', '', 'trim');
            //!session('?mobile_code')防止没有session的情况下，验证码空输入
            if(!session('?mobile_code') || $code != session('mobile_code')){
                return json(['status' => 'fail', 'msg' => '验证码不正确']);
            }
            $create_time = Db::name('mobile')->where('code', $code)->find()['create_time'];
            //验证码发送60秒后失效
            if(time() - $create_time > 60) {
                return json(['status'=>'fail', 'msg'=>'验证码已过期']);
            }*/

            $mobile = $request->param('mobile', '', 'trim');
            $password = $request->param('password', '', 'trim');
            $userModel = new userModel;
            $res = $userModel->toLogin($mobile, $password);
            if($res['status'] == 'success') {
                session('mobile_code', null);
                session('mobile', $mobile);
            }
            return json($res);
        }else{
            return $this->fetch('login');
        }
    }

    public function logout() {
        session('mobile', null);
        $this->redirect('/');
    }

    public function register(Request $request) {
        if($request->isPost()){
            $code = $request->param('code', '', 'trim');
            //!session('?mobile_code')防止没有session的情况下，验证码空输入
            if(!session('?mobile_code') || $code != session('mobile_code')){
                return json(['status' => 'fail', 'msg' => '验证码不正确']);
            }
            $create_time = Db::name('mobile')->where('code', $code)->find()['create_time'];
            //验证码发送60秒后失效
            if(time() - $create_time > 60) {
                return json(['status'=>'fail', 'msg'=>'验证码已过期']);
            }
            $mobile = $request->param('mobile', '', 'trim');
            $password = $request->param('password', '', 'trim');
            $salt = mt_rand(100000, 999999);
            $password = md5($password . $salt);
            $data = ['mobile' => $mobile, 'password' => $password, 'salt' => $salt, 'create_time' => time()];

            $userModel = new userModel;
            if($userModel->insertUser($data)) {
                session('mobile_code', null);
                session('mobile', $mobile);
                return json(['status' => 'success', 'msg' => '注册成功']);
            }else{
                return json(['status' => 'fail', 'msg' => '注册失败']);
            }
        }else{
            return $this->fetch('register');
        }
    }

    public function checkUser(Request $request) {
        $mobile = $request->param('param', '', 'trim');
        $userModel = new userModel;
        $res = $userModel->checkUser($mobile);
        if($res) {
            return json(['status'=>'n', 'info'=>'手机号已经注册']);
        }else{
            return json(['status'=>'y', 'info'=>'手机号可以注册']);
        }
    }

    public function send(Request $request) {
        $mobile = $request->param('mobile','','trim');
        if (!preg_match("/^1[3|5|6|7|8|9]\d{9}$/", $mobile)) {
            return json(['status'=>'fail']);
        }
        $code = mt_rand(1000, 9999);
        //stdClass Object ( [Message] => OK [RequestId] => 0A5E17F5-A229-49F4-9E6A-54A7FEA6AA19
        // [BizId] => 225600658344692357^0 [Code] => OK )
        require_once  "../extend/aliyun/api_demo/SmsDemo.php";
        $response = \SmsDemo::sendSms($mobile,$code);
        if($response->Message == 'OK') {
            session('mobile_code',$code);
            Db::name('mobile')->insert(['mobile' => $mobile, 'code'=> $code, 'create_time'=> time()]);
            return json(['status'=>'success']);
        }else{
            return json(['status'=>'fail']);
        }
    }
}
