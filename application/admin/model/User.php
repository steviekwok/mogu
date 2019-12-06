<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    public function getUsers() {
        return $this->order('id desc')->paginate(6);
    }

    public function frozeUser($id) {
        $is_froze = $this->where('id', $id)->value('is_froze');
        if($is_froze) {
            return $this->where('id', $id)->update(['is_froze'=>0]);
        }else{
            return $this->where('id', $id)->update(['is_froze'=>1]);
        }
    }
}
