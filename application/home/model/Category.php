<?php

namespace app\home\model;

use think\Model;

class Category extends Model
{
    public function getIndexCats() {
        return $this->where('is_index', 1)->select();
    }

    public function getParName($pid){
        return $this->where('cat_id', $pid)->value('cat_name');
    }
}
