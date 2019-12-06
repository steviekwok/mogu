<?php

namespace app\home\model;

use think\Model;

class Image extends Model
{
    public function getLogo() {
        return $this->where('type',1)->field('img_url')->find();
    }

    public function getImg() {
        return $this->where('type',2)->field('img_url')->find(12);
    }
}
