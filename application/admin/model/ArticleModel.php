<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class ArticleModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'bbs_article';

    use SoftDelete;
    protected $deleteTime = 'delete_time';

    // 查询全部文章
    public static function index($page) {
        $data = ArticleModel::limit($page * 5,5)->order('id', 'desc')->all();
        $count = ArticleModel::count();
        if (!$data || !$count) {
            return;
        }
        return ['data'=>$data,'count'=>$count];
    }

    // 搜索文章
    public static function search($title) {
        $data = ArticleModel::whereLike('title',"%".$title.'%')->select();

        if (!$data) {
            return false;
        }
        return ['data' => $data];
    }

    // 删除文章
    public static function del_article($id) {
        $data = ArticleModel::destroy($id);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 修改文章状态
    public static function update_status($id, $status)
    {
        $data = ArticleModel::where('id',$id)
            ->find();
        $data->status = $status;
        $result = $data->save();
        if (!$result) {
            return false;
        }
        return true;
    }

    // 添加文章
    public static function insert_article($data) {
        $data = ArticleModel::create($data);
        if (!$data) {
            return false;
        }
        return true;
    }

    // 修改文章
    public static function update_article($id, $data) {
        $article = new ArticleModel();
        $data = $article->save($data,['id' => $id]);
        if (!$data) {
            return false;
        }
        return $data;
    }

    // 查询单个文章
    public static function find_article($id) {
        $data = ArticleModel::where('id', $id)->find();
        if (!$data) {
            return false;
        }
        return $data;
    }
}
