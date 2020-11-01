<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class MusicModel extends Model
{
    // 数据表名
    protected $table = "bbs_music";

    use SoftDelete;
    // 软删除
    protected $deleteTime = "delete_time";

    // 查询所有数据
    public static function select_all($page) {
        $data = MusicModel::limit($page * 5, 5)->order('id', 'desc')->select();
        $count = MusicModel::count();
        if (!$data||!$count) {
            return false;
        }
        return ['count'=> $count, 'data'=>$data];
    }

    // 查询单条数据
    public static function find_music($id) {
        $data = MusicModel::where('id', $id)->find();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 搜索数据
    public static function search_music($title) {
        $data = MusicModel::whereLike('title',"%".$title.'%')->select();

        if (!$data) {
            return false;
        }
        return $data;
    }

    // 删除数据
    public static function remove_music($id) {
        $data = MusicModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 修改数据
    public static function update_music($id, $data) {
        $music = new MusicModel();
        $data = $music->save($data, ['id'=>$id]);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 添加数据
    public static function insert_music($data) {
        $data = MusicModel::create($data);
        if (!$data) {
            return false;
        }
        return $data;
    }
}
