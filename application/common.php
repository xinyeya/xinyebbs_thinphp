<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use \think\Db;

function getArticleRead() {
    return Db::table('bbs_article')
        ->where('status', 1)
        ->field('id,title')
        ->select();
}

// 获取所有分类
function getClassify() {
    return Db::table('bbs_classify')
        ->field('id, title')
        ->select();
}

// 获取所有标签
function getLabels() {
    return Db::table('bbs_labels')
        ->field('id,title')
        ->select();
}