<?php

namespace app\home\controller;

use think\Controller;

class About extends Controller
{
    public function index() {
        $data = [
            "title" => "心叶的个人博客|关于我"
        ];
        return $this->fetch('home@about/index', $data);
    }
}
