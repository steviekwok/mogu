<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class Goods extends Model
{
    public function addGoods($data) {
        return $this->insert($data);
    }

    public function getAllGoods() {
        return Db::name('goods g')->join('category c', 'g.cat_id=c.cat_id')
            ->field('g.goods_name,g.goods_img,g.pro_price,g.is_on,is_hot,g.create_time,g.goods_id,c.cat_name')
            ->order('g.goods_id desc')
            ->paginate(6);
    }

    public function getGoodsByCat($cat_id) {
        return Db::name('goods g')->join('category c', 'g.cat_id=c.cat_id')
            ->where('c.cat_id', $cat_id)
            ->field('g.goods_name,g.goods_img,g.pro_price,g.is_on,g.is_hot,g.create_time,g.goods_id,c.cat_name')
            ->order('g.goods_id desc')
            ->paginate(1, false, ['query'=>['cat_id'=>$cat_id]]);
    }

    public function getOneGoods($id) {
        return $this->where('goods_id', $id)->find();
    }

    public function updateGoods($data, $id) {
        return $this->where('goods_id', $id)->update($data);
    }

    public function delGoods($id) {
        return $this->where('goods_id', $id)->delete();
    }
}
