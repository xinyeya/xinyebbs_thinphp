<?php

namespace app\home\controller;

use think\Controller;

class Message extends Controller
{
    public function index() {
        $data = [
            "title" => "心叶的个人博客 | 留言板"
        ];
        return $this->fetch("home@message/index", $data);
    }
}
