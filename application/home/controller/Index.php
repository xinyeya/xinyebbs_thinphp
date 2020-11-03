<?php

namespace app\home\controller;

use think\Controller;
use think\Db;
use \Common;

class Index extends Controller
{

    // 获取用户信息
    public function index () {
        // 查询文章内容
        $userInfo = Common::getUserInfo();

        // 查询文章
        $article = Db::table('bbs_article')
            ->where('status', 1)
            ->order('id', "desc")
            ->paginate(5, true, [
                'type'     => 'bootstrap',
                'var_page' => 'page',
            ]);

        // 获取分页显示
        $page = $article->render();

        // 查询标签
        $labels = Common::getLabels();

        // 友情链接
        $friend_link = Common::getLink();

        $data['userInfo'] = $userInfo;
        $data['article'] = $article;
        $data['labels'] = $labels;
        $data['friend_link'] = $friend_link;
        $data['page'] = $page;

        return $this->fetch('home@index/index', $data);
    }
}
