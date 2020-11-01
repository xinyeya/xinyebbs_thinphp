<?php

namespace app\home\controller;

use think\Controller;
use think\facade\Request;

class ArticleDetail extends Controller
{
    public function index (Request $request) {
        $data = [
            "title"=>"心叶的个人博客 | 文章内容",
            "articleTitle" => "测试文章标题",
            "articleDescription"=>"测试描述",
            "id" => Request::get("id")
        ];
        return  $this->fetch("home@articleDetail/index", $data);
    }
}
