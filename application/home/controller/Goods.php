<?php

namespace app\home\controller;
use app\home\model\Goods as goodsModel;
use think\Db;

class Goods extends Base
{
     // 显示商品列表
    public function index($id)
    {
        $goodsModel = new goodsModel();
        $goods = $goodsModel->getCatGoods($id);
        $cat_name = Db::name('category')->where('cat_id', $id)->value('cat_name');
        $this->assign('cat_name', $cat_name);
        $this->assign('goods', $goods);
        return $this->fetch('list');
    }

    //显示商品详情
    public function detail($id) {
        $goodsModel = new goodsModel();
        $goods = $goodsModel->getDetailGoods($id);
        $goods['goods_color'] = explode('|', $goods['goods_color']);
        $goods['goods_color_desc'] = explode('|', $goods['goods_color_desc']);
        $goods['goods_type'] = explode('|', $goods['goods_type']);

        $comments = Db::name('comment c')->join('user u','c.user_id=u.id')->join('order o','c.order_id=o.id')
                                  ->where('c.goods_id',$id)
                                  ->field('c.content,c.create_time,u.mobile,o.goods_color_desc,o.goods_type')->select();
        $this->assign('com_count',count($comments));
        $this->assign('comments', $comments);
        $this->assign('goods', $goods);
        return $this->fetch('detail');
    }
}
