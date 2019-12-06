<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
    public function addCat($data) {
        return $this->insert($data);
    }

    public function getTopCat() {
        return $this->where('pid', 0)->select();
    }

    public function getCats() {
        return $this->select();
    }

    public function getCat($id) {
        return $this->where('cat_id', $id)->find();
    }

    public function upCat($cat, $cat_id) {
        return $this->where('cat_id', $cat_id)->update($cat);
    }

    public function delCat($id) {
        //如果底下还有分类，不能删除父类
        $is_pid = $this->where('pid', $id)->find();
        if($is_pid){
            return json(['status'=>'fail', 'msg'=>'此分类下还有子类，不能删除']);
        }
        $res = $this->where('cat_id', $id)->delete();
        if($res) {
            return json(['status'=>'success', 'msg'=>'删除成功']);
        }else {
            return json(['status'=>'fail', 'msg'=>'删除失败']);
        }
    }

    public function getSubCats() {
        return $this->where('pid','<>','0')->select();
    }
}
