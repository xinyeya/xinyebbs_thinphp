<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use \think\facade\Route;
use \app\http\middleware\Auth;

Route::group("/", function () {
    Route::get("/", "home/index/index")->name("index/index");
    Route::get("/article_detail/index", "home/articleDetail/index")->name("article_detail/index");
    Route::get("/classify/index", "home/classify/index")->name("classify/index");
    Route::get("/message/index", "home/message/index")->name("message/index");
    Route::get("/about/index", "home/about/index")->name("about/index");
});

Route::group("admin/v1.0", function () {
    Route::group("",function () {
        // 文章管理
        Route::group("/article", function () {
            Route::get("/index", "admin/index/index")->name("admin/index/index");
            Route::get("/search", "admin/index/search")->name("admin/index/search");
            Route::post("/insert", "admin/index/insert")->name("admin/index/insert");
            Route::post("/upload", "admin/index/upload")->name("admin/index/upload");
            Route::get("/update_status", "admin/index/update_status")->name("admin/index/update_status");
            Route::post("/update_article", "admin/index/update_article")->name("admin/index/update_article");
            Route::get("/delete", "admin/index/delete")->name("admin/index/delete");
            Route::get('/exit_find', "admin/index/exit_find_article")->name("admin/index/exit_find");
        });
        // 分类管理
        Route::group("/classify", function () {
            Route::get("/index", "admin/classify/index")->name("admin/classify/index");
            Route::get("/select", "admin/classify/select")->name("admin/classify/select");
            Route::get("/find", "admin/classify/find")->name("admin/classify/find");
            Route::get("/search", "admin/classify/search")->name("admin/classify/search");
            Route::post("/insert", "admin/classify/insert")->name("admin/classify/insert");
            Route::post("/update", "admin/classify/update")->name("admin/classify/update");
            Route::get("/remove", "admin/classify/remove")->name("admin/classify/remove");
        });
        // 标签管理
        Route::group("/labels", function () {
            Route::get("/index", "admin/labels/index")->name("admin/labels/index");
            Route::get("/insert", "admin/labels/insert")->name("admin/labels/insert");
            Route::get("/remove", "admin/labels/remove")->name("admin/labels/remove");
        });
        // 音乐管理
        Route::group("/music", function () {
            Route::get("/index", "admin/music/index")->name("admin/music/index");
            Route::get("/search", "admin/music/search")->name("admin/music/search");
            Route::get("/find", "admin/music/find")->name("admin/music/find");
            Route::get("/remove", "admin/music/remove")->name("admin/music/remove");
            Route::post("/insert", "admin/music/insert")->name("admin/music/insert");
            Route::post("/update", "admin/music/update")->name("admin/music/update");
            Route::post("/image_file", "admin/music/image_file")->name("admin/music/image_file");
            Route::post("/music_file", "admin/music/music_file")->name("admin/music/music_file");
        });
        // 留言管理
        Route::group("/content", function () {
            Route::get("/index", "admin/content/index")->name("admin/content/index");
            Route::get("/search", "admin/content/search")->name("admin/content/search");
            Route::get("/remove", "admin/content/remove")->name("admin/content/remove");
        });
        // 友情链接
        Route::group("/friend_link", function () {
            Route::get("/index", "admin/friend_link/index")->name("admin/friend_link/index");
            Route::get("/search", "admin/friend_link/search")->name("admin/friend_link/search");
            Route::get("/find", "admin/friend_link/find")->name("admin/friend_link/find");
            Route::get("/remove", "admin/friend_link/remove")->name("admin/friend_link/remove");
            Route::post("/insert", "admin/friend_link/insert")->name("admin/friend_link/insert");
            Route::post("/update", "admin/friend_link/update")->name("admin/friend_link/update");
        });
        // 关于博主
    })->middleware(Auth::class);
    // 登录
    Route::post("/login", "admin/login/index")->name("admin/login");
})
    ->header("Access-Control-Allow-Origin:*")
    ->header('Access-Control-Allow-Credentials', 'true')
    ->header("Access-Control-Allow-Methods:GET, POST")
    ->header("Access-Control-Allow-Headers: tokenXinye,Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With")
    ->allowCrossDomain();

