<?php
namespace app\home\controller;
use app\home\model\Image as imageModel;
use app\home\model\Category as catModel;
use app\home\model\Goods as goodsModel;
use think\Db;

class Index extends Base
{
    public function index()
    {
        $imgModel = new imageModel();
        $data = $imgModel->getImg();
        $this->assign('img_url',$data['img_url']);

        $top_cats = Db::name('category')->where('pid', 0)->select();
        $cats = [];
        foreach($top_cats as $k=>$v) {
            $sub_cats = Db::name('category')->where('pid', $v['cat_id'])->select();
            if($sub_cats) {
                $cats[$k] = $v;
                $cats[$k]['sub_cats'] = $sub_cats;
            }
        }

        $catModel = new catModel();
        $goodsModel = new goodsModel();
        $index_cat = $catModel->getIndexCats();
        $goods = [];
        foreach($index_cat as $k=>$v) {
            $par_name = $catModel->getParName($v['pid']);
            $index_goods = $goodsModel->getIndexGoods($v['cat_id']);
            $hot_goods = $goodsModel->getHotGoods($v['cat_id']);
            $goods[$k]['name'] = $par_name.'&'.$v['cat_name'];
            $goods[$k]['index_goods'] = $index_goods;
            $goods[$k]['hot_goods'] = $hot_goods;
        }
        $this->assign('goods', $goods);
        $this->assign('cats', $cats);
        return $this->fetch('index');
    }
}
