<?php

namespace app\home\controller;

use think\Controller;
use think\Db;
use think\facade\View;

class Index extends Controller
{
    private function getCommonData() {
        // 热门文章
        $article = getArticleRead();

        // 查询所有分类
        $classify = getClassify();

        // 查询所有标签
        $labels = getLabels();

        $this->assign([
            'article'  => $article,
            'classify' => $classify,
            'labels' => $labels
        ]);
    }

    // 显示首页
    public function index() {
        $this->getCommonData();
        return $this->fetch("index/index");
    }

    public function article($id) {
        echo $id;
        $this->getCommonData();
        return $this->fetch("index/index");
    }

    public function type($type) {
        echo $type;
        $this->getCommonData();
        return $this->fetch("index/index");
    }
}
