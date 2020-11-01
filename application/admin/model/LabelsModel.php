<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class LabelsModel extends Model
{

    use SoftDelete;

    // 设置当前模型对应的完整数据表名称
    protected $table = 'bbs_labels';

    protected $deleteTime = 'delete_time';

    // 查询标签
    public static function select_labels() {
        $data = LabelsModel::all();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 添加标签
    public static function insert_labels($title) {
        $data = LabelsModel::create(['title'=>$title]);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 删除标签
    public static function remove_labels($id) {
        $data = LabelsModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }

}
