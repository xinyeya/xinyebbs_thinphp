<?php

namespace app\index\controller;

use app\index\validate\IndexValidate;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    // 获取首页公共数据
    private function getCommonData() {
        // 热门文章
        $article = getArticleRead();

        // 查询所有分类
        $classify = getClassify();

        // 查询所有标签
        $labels = getLabels();
        return [
            'article'  => $article,
            'classify' => $classify,
            'labels' => $labels
        ];
    }

    // 显示首页
    public function index() {
        $data = $this->getCommonData();

        // 获取全部文章列表
        $articleList = Db::table('bbs_article')
            ->where('status',1)
            ->field('delete_time, image,content, classify_id, user_id', true)
            ->paginate(10);
        $page = $articleList->render();

        $data['articleList'] = $articleList;
        $data['page'] = $page;
        $this->assign($data);
        return $this->fetch("index/index");
    }

    // 获取文章详情
    public function article($id) {
        // 文章的详情内容
        $detail = Db::table("bbs_article")
            ->where("id", $id)
            ->where('status', 1)
            ->field('image,delete_time,user_id', true)
            ->find();


        // 根据分类id查找分类
        $classify = Db::table("bbs_classify")
            ->where('id',$detail['classify_id'])
            ->field("title")
            ->find();
        // 如果查不到表示分类被删除
        if (!$classify) {
            $classify['title'] = "该分类已被删除";
        }


        // 获取ip地址
        $ip = getIP();
        // 查询文章是否已经阅读过
//        $is_ip = Db::table('bbs_ip')
//            ->where("article_id", $id)
//            ->field('ip')
//            ->find();
        // 如果没有被阅读过，则加一阅读量并记录ip
//        if (!$is_ip) {
            Db::table('bbs_ip')
                ->insert(['ip'=>$ip, 'article_id'=> $id]);

            Db::table('bbs_article')
                ->where("id", $id)
                ->setInc('read');
//        }


        // 获取首页公共数据
        $data = $this->getCommonData();


        // 根据文章id查找对应的评论
        $contentList = Db::table("bbs_comment")
            ->where('article_id', $id)
            ->field('delete_time, email, article_id',true)
            ->order('id', 'desc')
            ->select();


        // 插入文章数据
        $data['detail'] = $detail;
        $data['detail_classify'] = $classify['title'];
        $data['contentList'] = $contentList;


        // 模板输出变量
        $this->assign($data);
        return $this->fetch("index/article");
    }

    /**
     * 根据分类查询
     * @param $type
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function type($type) {
        $data = $this->getCommonData();

        // 根据分类名查找相对的分类的id
        $type_id = Db::table("bbs_classify")
            ->field('id')
            ->where('title', $type)
            ->find();

        // 如果查不到使后面返回空
        if (!$type_id) {
            $type_id['id'] = "`c`.`delete_time`";
        }

        // 根据分类id查询对应的文章
        $articleList = Db::table('bbs_article')
            ->where('classify_id', $type_id['id'])
            ->paginate(10);

        $page = $articleList->render();

        $data['articleList'] = $articleList;
        $data['page'] = $page;
        $this->assign($data);
        return $this->fetch("index/index");
    }

    /**
     * 使用标题模糊查找
     * @param Request $request
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function search(Request $request) {
        $title = $request->get('title');

        // 查询对应的数据
        $articleList = Db::table('bbs_article')
            ->where('title','like','%'.$title.'%')
            ->where('status',1)
            ->field('delete_time,content,image,classify_id,user_id', true)
            ->paginate(10);

        $page = $articleList->render();

        // 获取左边的公共数据
        $data = $this->getCommonData();

        // 拼接搜索到的数据
        $data['articleList'] = $articleList;
        $data['page'] = $page;

        $this->assign($data);
        return $this->fetch("index/index");
    }

    // 添加评论内容
    public function articleComment($id, Request $request) {
        $comment = $request->post();

        $validate = new IndexValidate();
        if (!$validate->scene('edit')->check($comment)) {
            $this->error($validate->getError());
        }

        unset($comment['__token__']);
        $comment['create_time'] = date('Y-m-d', time());
        $comment['article_id'] = $id;
        dump($comment);
        $res = Db::table("bbs_comment")->insert($comment);

        if (!$res) {
            $this->error("评论失败");
        }
        $url = 'http://'
            .$_SERVER['SERVER_NAME']
            .$_SERVER["REQUEST_URI"]
            .$_SERVER["QUERY_STRING"];
        return redirect($url);
    }
}
