<?php

namespace app\admin\controller;

use app\admin\model\ClassifyModel;
use app\admin\validate\ClassifyValidate;
use think\Controller;
use think\Exception;
use think\Request;
use think\Validate;

class Classify extends Controller
{
    /**
     * 查询所有分类
     * @param Request $request
     * @return \think\response\Json
     */
    public function index(Request $request) {
        try {
            $page = $request->get('page');

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

            // 获取数据
            $data = ClassifyModel::select_classify($page);
            if (!$data) {
                return json(['code'=>201, 'msg'=> '查询失败']);
            }
            return json(['code'=>200, 'msg'=> '查询成功', 'data'=>$data]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    /**
     * 获取所有分类数据
     */
    public function select() {
        try {
            $data = ClassifyModel::select_all_classify();
            if (!$data) {
                return json(['code'=> 201, 'msg'=> '查询失败']);
            }
            return json(['code'=>200, 'msg'=> '查询成功', 'data'=>$data]);
        }catch (Exception $e) {
            return json(['code'=>500, 'msg'=>'服务器错误']);
        }
    }

    /**
     * 查询单条数据
     * @param Request $request
     * @return \think\response\Json
     */
    public function find(Request $request) {
        try {
            $id = $request->get('id');

            // 验证page是否合法
            $validate = Validate::make([
                'id' => 'require|number'
            ]);
            $data = [
                'id'  => $id,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            // 获取数据
            $data = ClassifyModel::find_classify($id);
            if (!$data) {
                return json(['code'=>201, 'msg'=> '查询失败']);
            }
            return json(['code'=>200, 'msg'=> '查询成功', 'data'=>$data]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    /**
     * 搜索分类
     * @param Request $request
     * @return \think\response\Json
     */
    public function search(Request $request) {
        try{
            $title = $request->get('title');

            // 验证page是否合法
            $validate = Validate::make([
                'title' => 'max:100'
            ]);
            $data = [
                'title'  => $title,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }
            // 获取数据
            $data = ClassifyModel::search_classify($title);

            if (!$data) {
                return json(['code'=> 201, 'msg'=> '搜索失败']);
            }
            return json(['code'=> 200, 'msg'=> '搜索成功', 'data'=> $data]);
        }catch (Exception $e){
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    /**
     * 添加分类
     * @param Request $request
     * @return \think\response\Json
     */
    public function insert(Request $request) {
        try {
            $classify = $request->post();

            // 验证信息
            $classify_validate = new ClassifyValidate();
            if (!$classify_validate->check($classify)) {
                return json(['code'=>400, 'msg'=>$classify_validate->getError()]);
            }

            $data = ClassifyModel::insert_classify($classify);

            if (!$data) {
                return json(['code'=>201, 'msg'=> '添加失败']);
            }
            return json(['code'=>200, 'msg'=> '添加成功']);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    /**
     * 修改分类
     * @param Request $request
     * @return \think\response\Json
     */
    public function update(Request $request) {
        $id = $request->get('id');
        $classify = $request->post();

        // 验证数据
        $classify_validate = new ClassifyValidate();
        if (!$classify_validate->check($classify)) {
            return json(["code"=>400, "msg"=>$classify_validate->getError()]);
        }

        $data = ClassifyModel::update_classify($id, $classify);

        if (!$data) {
            return json(['code'=> 201, 'msg'=>'修改失败']);
        }
        return json(['code'=> 200, 'msg'=>'修改成功']);
    }

    /**
     * 删除分类
     * @param Request $request
     * @return \think\response\Json
     */
    public function remove(Request $request) {
        try {
            $id = $request->get('id');

            // 验证page是否合法
            $validate = Validate::make([
                'id' => 'require|number'
            ]);
            $data = [
                'id'  => $id,
            ];
            if (!$validate->check($data)) {
                return json(["code"=>400, "msg"=>$validate->getError()]);
            }

            // 获取数据
            $data = ClassifyModel::remove_classify($id);
            if (!$data) {
                return json(['code'=>201, 'msg'=> '删除失败']);
            }
            return json(['code'=>200, 'msg'=> '删除成功']);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }
}
