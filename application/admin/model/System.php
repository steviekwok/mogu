<?php

namespace app\admin\model;

use think\Model;

class System extends Model
{
    public function getSys() {
        return $this->find();
    }

    public function updateSys($data, $id) {
        return $this->where(['id'=>$id])->update($data);
    }
}
