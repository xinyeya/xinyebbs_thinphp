<?php

namespace app\home\controller;

use think\Controller;

class Index extends Controller
{
    public function index () {
        $data = [
            'title' => '心叶的个人博客 | 首页',
        ];
        return $this->fetch('home@index/index', $data);
    }
}
