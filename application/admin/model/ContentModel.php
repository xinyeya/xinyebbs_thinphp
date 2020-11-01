<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class ContentModel extends Model
{
    protected $table = "bbs_content";

    use SoftDelete;
    protected $deleteTime = "delete_time";

    // 查询数据
    public static function select_all($page) {
        $data = ContentModel::limit($page * 5, 5)->select();
        $count = ContentModel::count();
        if (!$data||!$count) {
            return false;
        }
        return ['count'=>$count, 'data'=>$data];
    }

    // 搜索数据
    public static function search_content($username) {
        $data = ContentModel::whereLike('username',"%".$username.'%')->select();

        if (!$data) {
            return false;
        }
        return $data;
    }

    // 删除数据
    public static function remove_content($id) {
        $data = ContentModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }
}
