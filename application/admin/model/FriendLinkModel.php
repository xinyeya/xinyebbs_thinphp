<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class FriendLinkModel extends Model
{
    protected $table = 'bbs_friend_link';

    use SoftDelete;
    protected $deleteTime = "delete_time";

    // 查询所有
    public static function select_all($page) {
        $data = FriendLinkModel::limit($page * 5, 5)->order('id', 'desc')->select();
        $count = FriendLinkModel::count();
        if (!$data||!$count) {
            return false;
        }
        return ['count'=>$count, 'data'=> $data];
    }

    // 查询单条
    public static function find_link($id) {
        $data = FriendLinkModel::where('id', $id)->find();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 搜索
    public static function search_link($title) {
        $data = FriendLinkModel::whereLike('title',"%".$title.'%')->select();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 添加
    public static function insert_link($data) {
        $data = FriendLinkModel::create($data);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 修改
    public static function update_link($id, $data) {
        $friend_link = new FriendLinkModel();
        $data = $friend_link->save($data, ['id'=>$id]);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 删除
    public static function remove_link($id) {
        $data = FriendLinkModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }
}
