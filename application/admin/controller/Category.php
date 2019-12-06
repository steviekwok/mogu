<?php

namespace app\admin\controller;
use think\Request;
use app\admin\model\Category as catModel;

class Category extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $catModel = new catModel();
        $cats = $catModel->getCats();
        $cats = $this->getTree($cats);
        $this->assign('cats', $cats);
        return $this->fetch('list');
    }

    private function getTree($data, $pid=0, $lv=0) {
        static $list = [];
        foreach($data as $k => $v) {
            if($v['pid'] == $pid) {
                $v['lv'] = $lv;
                $list[] = $v;
                unset($data[$k]);
                $this->getTree($data, $v['cat_id'], $lv+1);
            }
        }
        return $list;
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $catModel = new catModel();
        $top_cat = $catModel->getTopCat();
        $this->assign('top_cat',$top_cat);
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
        $data = $request->param();
        $catModel = new catModel();
        $res = $catModel->addCat($data);
        if($res) {
            $this->success('添加分类成功', '/admin/category','', 2);
        }else{
            $this->error('添加分类失败', '/admin/category','', 2);
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
        $catModel = new catModel();
        $cat = $catModel->getCat($id);
        $top_cat = $catModel->getTopCat();
        $this->assign('cat', $cat);
        $this->assign('top_cat', $top_cat);
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
        $cat = $request->except('id');
        $catModel = new catModel();
        $res = $catModel->upCat($cat, $id);
        if($res) {
            $this->success('修改分类成功', '/admin/category','', 2);
        }else{
            $this->error('修改分类失败', '/admin/category','', 2);
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
        $catModel = new catModel();
        return  $catModel->delCat($id);
    }
}
