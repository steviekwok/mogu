<?php

namespace app\home\model;

use think\Model;

class Order extends Model
{
    public function addOrder($order) {
        return $this->insertAll($order);
    }

    public function getOrders($user_id) {
        return $this->alias('o')->where(['user_id'=>$user_id,'pay_status'=>1])->join('goods g','o.goods_id=g.goods_id')
            ->field('o.goods_id,o.goods_name,o.goods_color_desc,o.goods_type,o.goods_price,o.goods_num,o.fee,o.id,o.exp_name,
            o.exp_no,o.sub_trade_no,o.is_rec,o.is_refund,o.create_time,g.goods_img,g.original_price')
            ->paginate(6);
    }

    public function getOrder($oid) {
        return $this->alias('o')->where('id', $oid)->join('goods g','o.goods_id=g.goods_id')
            ->field('o.goods_id,o.goods_name,o.goods_price,o.goods_num,o.fee,o.id,o.create_time,g.goods_img,o.sub_trade_no')
            ->find();
    }

    public function comfirmRec($oid) {
        return $this->where('id', $oid)->update(['is_rec'=>1]);
    }
}
