<?php

namespace app\admin\model;

use think\Model;

class Image extends Model
{
    public function addImage($data) {
        return $this->insert($data);
    }

    public function getImages() {
        return $this->select();
    }

    public function getImage($id) {
        return $this->find($id);
    }

    public function updateImage($id,$data) {
        return $this->where('id',$id)->update($data);
    }

    public function delImage($id) {
        return $this->where('id',$id)->delete();
    }
}
