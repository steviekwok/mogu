<?php

namespace app\home\controller;

use think\Request;
use think\facade\Cookie;
use app\home\model\Goods as goodsModel;
use app\home\model\User as userModel;
use app\home\model\Order as orderModel;
use think\Db;

class Order extends Base
{
    //显示购物车
    public function cart(){
        if(Cookie::has('goods_list')) {
            $goods_list = explode('@', Cookie::get('goods_list'));
            $goodsModel = new goodsModel();
            $goods_cart = [];
            foreach ($goods_list as $k => $v) {
                $v = json_decode($v, true);
                if(!preg_match("/^\d+$/", $v['goods_id'])) {
                    die('404错误');
                }
                $goods_info = $goodsModel->getCartGoods($v['goods_id']);
                $goods_cart[$k]['goods_name'] = $goods_info['goods_name'];
                $goods_cart[$k]['goods_img'] = $goods_info['goods_img'];
                $goods_cart[$k]['original_price'] = $goods_info['original_price'];
                $goods_cart[$k]['pro_price'] = $goods_info['pro_price'];
                $goods_cart[$k]['goods_id'] = $v['goods_id'];
                $goods_cart[$k]['goods_color_desc'] = $v['goods_color_desc'];
                $goods_cart[$k]['goods_type'] = $v['goods_type'];
                $goods_cart[$k]['goods_num'] = $v['goods_num'];
                $goods_cart[$k]['cart_id'] = $k;
            }
            $this->assign('goods_cart', $goods_cart);
        }
        return $this->fetch('cart');
    }

    //去付款
    public function topay(Request $request){
        if(session('mobile') == null) {
            $this->redirect('/user/login');
        }
        $mobile = session('mobile');
        $userModel = new userModel;
        $user_id = $userModel->getUserId($mobile);
        $address = Db::name('address')->where('user_id', $user_id)->select();
        if(!$address) {
            $this->redirect('/user/address');
        }

        $goodsModel = new goodsModel();
        $goods_list = [];
        if($request->param('type') == 'buy') {
            $goods_form = $request->param('','','trim');
            if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_+]{1,20}$/u", $goods_form['goods_color_desc']) ||
                !preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_+]{1,20}$/u", $goods_form['goods_type'])    ||
                !preg_match("/^buy|cart$/", $goods_form['type'])){
                die('404错误');
            }
            if(!preg_match("/^\d+$/", $goods_form['goods_id']) || !preg_match("/^\d+$/", $goods_form['goods_num']) ) {
                die('404错误');
            }
            $goods = $goodsModel->getCartGoods($goods_form['goods_id']);
            $goods['goods_type'] = $goods_form['goods_type'];
            $goods['goods_color_desc'] = $goods_form['goods_color_desc'];
            $goods['goods_num'] = $goods_form['goods_num'];
            $goods['total_price'] = $goods_form['goods_num'] * $goods['pro_price'];
            $goods['goods_id'] = $goods_form['goods_id'];
            $goods_list['total_num'] = $goods_form['goods_num'];
            $goods_list['total_price'] = $goods['total_price'];
            $goods_list['goods'][] = $goods;
        }elseif($request->param('type') == 'cart') {
            $cart_id =  join(',', $request->param('checkItem'));
            if(!preg_match("/^[\d,]+$/", $cart_id )) {
                die('404错误');
            }
            $cart_id = explode(',', $cart_id);
            $cart_goods = explode("@", Cookie::get('goods_list'));
            $goods_list['total_price'] = $goods_list['total_num'] = 0;
            foreach($cart_id as $v){
                $goods_form = json_decode($cart_goods[$v], true);
                $goods = $goodsModel->getCartGoods($goods_form['goods_id']);
                $goods['goods_type'] = $goods_form['goods_type'];
                $goods['goods_color_desc'] = $goods_form['goods_color_desc'];
                $goods['goods_num'] = $goods_form['goods_num'];
                $goods['total_price'] = $goods_form['goods_num'] * $goods['pro_price'];
                $goods['goods_id'] = $goods_form['goods_id'];
                $goods_list['total_num'] += $goods_form['goods_num'];
                $goods_list['total_price'] +=  $goods['total_price'];
                $goods_list['goods'][] = $goods;
            }

        }else{
            die('404错误');
        }
        $this->assign('goods_list', $goods_list);
        $this->assign('address', $address);
        return $this->fetch('topay');
    }

    //确认付款
    public function pay(Request $request){
        $data = $request->param();
        $trade_no = date('YmdHis').mt_rand(10000,99999);
        $mobile = session('mobile');
        $userModel = new userModel;
        $user_id = $userModel->getUserId($mobile);
        $order=[];
        foreach($data['goods'] as $k => $v){
            $sub_trade_no = (time()*5).mt_rand(10000,99999);
            list($goods_id, $goods_name, $goods_color_desc, $goods_type, $goods_price, $goods_num, $fee) = explode('=', $v);
            $order[$k]['goods_id'] = $goods_id;
            $order[$k]['goods_name'] = $goods_name;
            $order[$k]['goods_color_desc'] = $goods_color_desc;
            $order[$k]['goods_type'] = $goods_type;
            $order[$k]['goods_price'] = $goods_price;
            $order[$k]['goods_num'] = $goods_num;
            $order[$k]['fee'] = $fee;
            $order[$k]['trade_no'] = $trade_no;
            $order[$k]['sub_trade_no'] = $sub_trade_no;
            $order[$k]['address_id'] = $data['address_id'];
            $order[$k]['pay_type'] = $data['pay_type'];
            $order[$k]['user_id'] = $user_id;
            $order[$k]['create_time'] = time();
        }
        $orderModel = new orderModel;
        $orderModel->addOrder($order);
        $this->assign('total_price',$data['total_price']);
        $this->assign('total_num',count($order)-1);
        $this->assign('goods_name',$order[0]['goods_name']);
        //要增添微信支付宝付款代码
        return $this->fetch('pay');
    }

    public function addCart(Request $request) {
        $data = $request->param();
        if(Cookie::has('goods_list')) {
            $goods_list = explode('@', Cookie::get('goods_list'));
            foreach($goods_list as $k => $v) {
                $v = json_decode($v, true);
                if($data['goods_color_desc'] == $v['goods_color_desc'] && $data['goods_type'] == $v['goods_type']
                   && $data['goods_id'] == $v['goods_id'] ) {

                   $v['goods_num'] += $data['goods_num'];
                   $goods_list[$k] = json_encode($v);
                   $on = true;
                }
            }
            $goods_list = implode('@', $goods_list);
            if(isset($on)) {
                Cookie::set('goods_list', $goods_list);
            }else {
                Cookie::set('goods_list', $goods_list . '@' . json_encode($data));
            }
        }else{
            Cookie::set('goods_list', json_encode($data));
        }
        return true;
    }

    public function delAllCart() {
        if(Cookie::has('goods_list')) {
            Cookie::set('goods_list', null);
        }
    }

    public function delCart(Request $request) {
        $id = $request->param('id');
        if(!preg_match("/^\d+$/", $id)) {
            return json(['status'=>'fail']);
        }
        $goods_list = explode('@', Cookie::get('goods_list'));
        unset($goods_list[$id]);
        Cookie::set('goods_list', implode('@', $goods_list));
        return json(['status'=>'success']);
    }
}
