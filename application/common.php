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

// 热门文章
function getArticleRead() {
    return Db::table('bbs_article')
        ->where('status', 1)
        ->field('id,title')
        ->order('read', 'desc')
        ->select();
}

// 获取所有分类
function getClassify() {
    // 分类数据
    $classify = Db::table('bbs_classify')
        ->field('id, title')
        ->select();

    // 分类的数量
    $classifyCount = Db::table('bbs_classify')->count();

    // 循环查询分类相对应的文章数量
    for($i=0;$i<$classifyCount;$i++)
    {
        $classify[$i]['count'] = Db::table('bbs_article')->where(array('classify_id'=>$classify[$i]['id']))->count();
    }
    return $classify;
}

// 获取所有标签
function getLabels() {
    return Db::table('bbs_labels')
        ->field('id,title')
        ->select();
}

// 获取客户端IP
function getIP()
{
    if (@$_SERVER["HTTP_X_FORWARDED_FOR"])
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else if (@$_SERVER["HTTP_CLIENT_IP"])
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    else if (@$_SERVER["REMOTE_ADDR"])
        $ip = $_SERVER["REMOTE_ADDR"];
    else if (@getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (@getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (@getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "Unknown";
    return $ip;
}