<?php

namespace app\admin\controller;
use think\Request;
use app\admin\model\Image as imageModel;

class Image extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $imgModel = new imageModel();
        $images = $imgModel->getImages();
        $this->assign('images', $images);
        return $this->fetch('list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
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
        if(empty($data['img_url']) ) {
            $this->error('你图片有冇传啊？');
        }
        $imageModel = new imageModel();
        $res = $imageModel->addImage($data);
        if($res) {
            $this->success('添加图片成功','/admin/image','',1);
        }else {
            $this->error('添加图片失败','/admin/image');
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
        $imageModel = new imageModel();
        $data = $imageModel->getImage($id);
        $this->assign('image', $data);
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
        $data = $request->except(['file','_method']);
        if(empty($data['img_url']) ) {
            $this->error('你图片有冇传啊？');
        }
        $imageModel = new imageModel();
        $res = $imageModel->updateImage($id, $data);
        if($res) {
            $this->success('修改图片成功','/admin/image','',1);
        }else {
            $this->error('修改图片失败','/admin/image');
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
        $imgModel = new imageModel();
        $res = $imgModel->delImage($id);
        if($res) {
            return json(['status'=>'success']);
        }else {
            return json(['status'=>'fail']);
        }
    }

    public function upload(Request $request) {
        $file = $request->file('file');
        $res = $file->validate(config('VALIDATE'))->move(config('AD_PATH'));
        //dump(config('VALIDATE'));
        if($res) {
            $file_path = $res->getPathname();
            return json(['status'=>'success','msg'=>$file_path]);
        }else {
            return json(['status'=>'fail','msg'=>$file->getError()]);
        }
    }
}
