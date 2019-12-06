<?php

namespace app\admin\controller;
use think\Db;
use think\Request;

class Order extends Base
{
    public function index() {
        $orders = Db::name('order')->field('id,address_id,goods_name,goods_color_desc,goods_type,goods_price,goods_num,fee,sub_trade_no,pay_status,pay_type,
                    create_time,exp_no')->paginate(8);
        $this->assign('orders', $orders);
        return $this->fetch('list');
    }

    public function express($id, $aid) {
        $address = Db::name('address')->field('name,mobile,pro,city,dis,street')->find($aid);
        $this->assign('address',$address);
        $this->assign('order_id',$id);
        return $this->fetch('express');
    }

    public function doExpress(Request $request) {
        $exp_name = $request->param('exp_name');
        $exp_no = $request->param('exp_no','','trim');
        $order_id = $request->param('order_id');
        $res = Db::name('order')->where('id', $order_id)->update(['exp_name'=>$exp_name, 'exp_no'=>$exp_no]);
        if($res) {
            $this->success('发货成功', 'admin/order/index');
        }else {
            $this->error('发货失败', 'admin/order/index');
        }
    }

    public function refund() {
        $refunds = Db::name('refund r')->join('order o','r.order_id=o.id')->field('r.mobile,r.content,r.create_time,
                      r.get_good,r.order_id,o.goods_name,o.pay_type,o.fee,o.sub_trade_no,o.is_refund')->paginate(6);
        $this->assign('refunds', $refunds);
        return $this->fetch();
    }

    public function applyRefund($oid,$pay_type) {
        //pay_type判断是支付宝或微信的退款－返款
        $res = Db::name('order')->where('id',$oid)->update(['is_refund'=>2]);
        if($res) {
            return $this->success('退款成功','admin/order/refund');
        }else{
            return $this->error('退款失败','admin/order/refund');
        }
    }
}
