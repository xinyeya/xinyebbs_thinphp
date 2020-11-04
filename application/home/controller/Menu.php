<?php

namespace app\home\controller;

use think\Controller;
use think\facade\View;

class Menu extends Controller
{
    // 显示首页
    public function index() {
        return $this->fetch("index/index");
    }

    // 资源页
    public function response() {
        return $this->fetch("index/recourse");
    }

    // 关于我
    public function about() {
        return $this->fetch("index/about");
    }
}
