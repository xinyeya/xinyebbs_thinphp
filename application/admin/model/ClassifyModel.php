<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class ClassifyModel extends Model
{
    use SoftDelete;

    // 设置当前模型对应的完整数据表名称
    protected $table = 'bbs_classify';

    protected $deleteTime = 'delete_time';

    // 查询所有数据(分页)
    public static function select_classify($page) {
        $data = ClassifyModel::limit($page * 5, 5)->order('id', 'desc')->select();
        $count = ClassifyModel::count();
        if (!$data||!$count) {
            return false;
        }
        return ['data'=>$data, 'count'=>$count];
    }

    // 查询所有分类
    public static function select_all_classify() {
        $data = ClassifyModel::all();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 搜索数据
    public static function search_classify($title) {
        $data = ClassifyModel::whereLike('title',"%".$title.'%')->select();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 查询单条数据
    public static function find_classify($id) {
        $data = ClassifyModel::where('id', $id)->find();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 添加数据
    public static function insert_classify($data) {
        $data = ClassifyModel::create($data);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 更新数据
    public static function update_classify($id, $data) {
        $classify = new ClassifyModel();
        // save方法第二个参数为更新条件
        $data = $classify->save($data,['id' => $id]);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 删除数据
    public static function remove_classify($id) {
        $data = ClassifyModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }
}
