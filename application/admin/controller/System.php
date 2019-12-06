<?php

namespace app\admin\controller;
use think\Request;
use app\admin\model\System as sysModel;

class System extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $sysModel = new sysModel;
        $sys = $sysModel->getSys();
        $this->assign('sys',$sys);
        return $this->fetch('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
        $sysModel = new sysModel;
        $sys = $sysModel->getSys();
        $this->assign('sys',$sys);
        return $this->fetch('edit');
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
        $data = $request->except('_method');
        $sysModel = new sysModel;
        $res = $sysModel->updateSys($data, $id);
        if($res) {
            $this->success('更新成功','/admin/system','',2);
        }else {
            $this->error('更新失败','/admin/system');
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
        //
    }
}
