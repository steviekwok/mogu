<?php

namespace app\admin\controller;
use think\Request;
use app\admin\model\Goods as goodsModel;
use app\admin\model\Category as catModel;
class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $goodsModel = new goodsModel();
        $goods = $goodsModel->getAllGoods();
        $catModel = new catModel();
        $cats = $catModel->getSubCats();
        $this->assign('cats', $cats);
        $this->assign('goods', $goods);
        return $this->fetch('list');
    }

    public function search($cat_id) {
        $goodsModel = new goodsModel();
        $goods = $goodsModel->getGoodsByCat($cat_id);
        $catModel = new catModel();
        $cats = $catModel->getSubCats();
        $this->assign('cats', $cats);
        $this->assign('goods', $goods);
        return $this->fetch('list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $catModel = new catModel();
        $cats = $catModel->getSubCats();
        $this->assign('cats', $cats);
        return $this->fetch('add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->except('file');
        $data['goods_color'] = implode('|', $data['goods_color']);
        $data['goods_color_desc'] = implode('|', $data['goods_color_desc']);
        $data['create_time'] = time();
        $goodsModel = new goodsModel();
        if($goodsModel->addGoods($data)) {
            $this->success('添加商品成功','/admin/goods','',1);
        }else {
            $this->error('添加商品失败','/admin/goods');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $goodsModel = new goodsModel();
        $goods = $goodsModel->getOneGoods($id);
        $goods['goods_color'] = explode('|', $goods['goods_color']);
        $goods['goods_color_desc'] = explode('|', $goods['goods_color_desc']);
        $catModel = new catModel();
        $cats = $catModel->getSubCats();
        $this->assign('cats', $cats);
        $this->assign('goods', $goods);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['file','id']);
        $data['goods_color'] = implode('|', $data['goods_color']);
        $data['goods_color_desc'] = implode('|', $data['goods_color_desc']);
        $goodsModel = new goodsModel();
        if($goodsModel->updateGoods($data, $id)) {
            $this->success('修改商品成功','/admin/goods','',1);
        }else {
            $this->error('修改商品失败','/admin/goods');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $goodsModel = new goodsModel();
        if($goodsModel->delGoods($id)) {
            return json(['status'=>'success', 'msg'=>'删除成功']);
        }else {
            return json(['status'=>'fail', 'msg'=>'删除失败']);
        }
    }

    public function upload(Request $request) {
        $file = $request->file('file');
        $res = $file->validate(config('VALIDATE'))->move(config('GOOD_PATH'));
        if($res) {
            $file_path = $res->getPathname();
            return json(['status'=>'success','msg'=>$file_path]);
        }else {
            return json(['status'=>'fail','msg'=>$file->getError()]);
        }
    }
}
