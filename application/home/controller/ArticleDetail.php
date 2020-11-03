<?php

namespace app\home\controller;

use think\Controller;
use think\facade\Request;

class ArticleDetail extends Controller
{
    public function index ($id) {
        return "当前文章的id是".$id;
        $data = [
            "title"=>"心叶的个人博客 | 文章内容",
            "articleTitle" => "测试文章标题",
            "articleDescription"=>"测试描述",
            "id" => Request::get("id")
        ];
        return  $this->fetch("home@articleDetail/index", $data);
    }
}
