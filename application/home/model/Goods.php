<?php

namespace app\home\model;

use think\Model;

class Goods extends Model
{
    public function getCatGoods($cat_id) {
        return $this->where(['cat_id'=>$cat_id, 'is_on'=>'1'])
            ->field('goods_id, goods_name, goods_img, original_price, pro_price')
            ->select();
    }

    public function getDetailGoods($id) {
        return $this->where('goods_id', $id)
            ->field('goods_id, goods_name, goods_img, goods_color, goods_color_desc, goods_type, goods_desc, original_price, pro_price')
            ->find();
    }

    public function getCartGoods($id) {
        return $this->where('goods_id', $id)
            ->field('goods_name, goods_img, original_price, pro_price')
            ->find();
    }

    public function getIndexGoods($cat_id) {
        return $this->field('goods_id,goods_name,goods_img,pro_price')
            ->where(['cat_id'=>$cat_id, 'is_on'=>1])
            ->order('goods_id desc')
            ->limit(6)
            ->select();
    }

    public function getHotGoods($cat_id) {
        return $this->field('goods_id,goods_name,goods_img,pro_price')
            ->where(['cat_id'=>$cat_id, 'is_hot'=>1])
            ->order('goods_id desc')
            ->limit(6)
            ->select();
    }
}
