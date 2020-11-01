<?php
namespace app\admin\controller;

use app\admin\model\ArticleModel;
use \app\admin\validate\ArticleValidate;
use Faker\Factory;
use think\Controller;
use think\Db;
use think\Exception;
use \think\facade\Request;
use think\Validate;

class Index extends Controller
{

    /**
     * 查看所有文章
     * @param Request $request
     * @return \think\response\Json
     */
    public function index(Request $request) {
        try {
            // 获取值
            $page = $request::get("page");

            // 验证page是否合法
            $validate = Validate::make([
                'page' => 'require|number'
            ]);
            $data = [
                'page'  => $page,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            // 查询数据
            $data = ArticleModel::index($page);

            return json(["code"=>200, "msg"=>"查询成功", "data"=>$data]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"服务器错误"]);
        }
    }

    /**
     * 搜索文章
     * @param Request $request
     * @return \think\response\Json
     */
    public function search(Request $request) {
        try {
            $title = $request::get("search");
            $page = $request::get("page");

            // 验证title是否合法
            $validate = Validate::make([
                'title' => 'max:100',
            ]);
            $data = [
                'title'  => $title,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            if (empty($title)) {
                $data = ArticleModel::index(1);
            }else{
                // 查询数据
                $data = ArticleModel::search($title);
            }
            return json(["code"=>200, "msg"=>"查询成功", "data"=>$data]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"服务器错误"]);
        }
    }

    /**
     * 添加文章内容
     * @param Request $request
     * @return \think\response\Json
     */
    public function insert(Request $request)
    {
        try {
            $article = $request::post();

            // 验证数据是否合法
            $articleValidate = new ArticleValidate();
            if (!$articleValidate->check($article)) {
                return json(["code"=>400, "msg"=>$articleValidate->getError()]);
            }

            // 组装数据
            $article['status'] = 0;
            $article['user_id'] = 1;
            $article['create_time'] = date('Y-m-d H:i:s');

            // 数据入库
            $data = ArticleModel::insert_article($article);
            if (!$data) {
                return json(["code"=>200, "msg"=>"添加失败"]);
            }
            return json(["code"=>200, "msg"=>"添加成功"]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"服务器错误"]);
        }
    }

    /**
     * 上传封面图
     * @return \think\response\Json
     */
    public function upload(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->validate(['ext'=>'jpg,png,gif'])->move( '../public/static/uploads/admin/article/image');
        if($info){
            // 成功上传后 获取上传信息
            return json(["code"=>200, "msg"=>"上传成功","data"=>$_SERVER['SERVER_NAME']."/static/uploads/admin/article/image/".$info->getSaveName()]);
        }else{
            // 上传失败获取错误信息
            return json(["code"=>500, "msg"=>$file->getError()]);
        }
    }

    /**
     * 修改状态
     * @param Request $request
     * @return \think\response\Json
     */
    public function update_status(Request $request) {
        try {
            $id = $request::get('id');
            $status = $request::get('status');

            // 验证page是否合法
            $validate = Validate::make([
                'id' => 'require|number',
                'status' => 'require|number'
            ]);
            $data = [
                'id'  => $id,
                'status'  => $status,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>"查询失败", "data"=>$validate->getError()]);
            }

            $data = ArticleModel::update_status($id, $status);

            if (!$data) {
                return json(["code"=>200, "msg"=>"修改失败"]);
            }
            return json(["code"=>200, "msg"=>"修改成功"]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"服务器错误"]);
        }
    }

    /**
     * 修改文章
     * @param Request $request
     * @return \think\response\Json
     */
    public function update_article(Request $request) {
        try {
            $id = $request::get('id');
            $article = $request::post();

            // 验证数据是否合法
            $articleValidate = new ArticleValidate();
            if (!$articleValidate->check($article)) {
                return json(["code"=>400, "msg"=>$article->getError()]);
            }

            // 组装数据
            $article['status'] = 0;
            $article['user_id'] = 1;
            $article['create_time'] = date('Y-m-d H:i:s');

            $data = ArticleModel::update_article($id, $article);

            if (!$data) {
                return json(["code"=>200, "msg"=>"修改失败"]);
            }
            return json(["code"=>200, "msg"=>"修改成功"]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"修改失败"]);
        }
    }

    /**
     * 删除文章
     * @param Request $request
     * @return \think\response\Json
     */
    public function delete(Request $request) {
        try {
            $id = $request::get("id");

            // 验证id是否合法
            $validate = Validate::make([
                'id' => 'require|number'
            ]);
            $data = [
                'id'  => $id,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            $data = ArticleModel::del_article($id);
            if (!$data) {
                return json(["code"=>200, "msg"=>"删除失败"]);
            }
            return json(["code"=>200, "msg"=>"删除成功"]);
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>"服务器错误"]);
        }
    }

    /**
     * 查询单条数据
     * @param Request $request
     * @return \think\response\Json
     */
    public function exit_find_article(Request $request) {
        try {
            $id = $request::get('id');

            // 验证id是否合法
            $validate = Validate::make([
                'id' => 'require|number'
            ]);
            $data = [
                'id'  => $id,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            // 查询数据
            $data = ArticleModel::find_article($id);
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=> $data]);
        }catch (Exception $e) {
            return json(['code'=>500, 'msg'=> '服务器错误']);
        }
    }
}
