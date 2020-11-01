<?php

namespace app\admin\controller;

use app\admin\model\LabelsModel;
use think\Controller;
use think\Exception;
use think\Request;
use think\Validate;

class Labels extends Controller
{
    // 查询标签
    public function index() {
        try {
            $data = LabelsModel::select();
            if (!$data) {
                return json(['code'=> 201, 'msg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=> $data]);
        }catch (Exception $e) {
            return json(['code'=>500, 'msg'=> '服务区错误']);
        }
    }

    // 添加标签
    public function insert(Request $request) {
        $title = $request->get("title");

        // 验证page是否合法
        $validate = Validate::make([
            'title' => 'require|max:30'
        ]);
        $data = [
            'title'  => $title,
        ];
        if (!$validate->check($data)) {
            return json(["code"=>400, "msg"=>$validate->getError()]);
        }

        $data = LabelsModel::insert_labels($title);

        if (!$data) {
            return json(['code'=>201, 'msg'=> '添加失败']);
        }
        return json(['code'=>200,'msg'=> '添加成功']);
    }

    // 删除标签
    public function remove(Request $request) {
        try {
            $id = $request->get('id');

            $validate = Validate::make([
                'id' => 'require|number'
            ]);
            $data = [
                'id'=> $id
            ];
            if (!$validate->check($data)) {
                return json(['code'=>400, 'msg'=>$validate->getError()]);
            }

            $data = LabelsModel::remove_labels($id);
            if (!$data) {
                return json(['code'=> 201, 'msg'=> '删除失败']);
            }
            return json(['code'=> 200, 'msg'=> '删除成功']);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }
}
