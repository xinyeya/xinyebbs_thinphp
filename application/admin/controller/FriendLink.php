<?php

namespace app\admin\controller;

use app\admin\model\FriendLinkModel;
use app\admin\validate\FriendLinkValidate;
use think\Controller;
use think\Exception;
use think\Request;
use think\Validate;

class FriendLink extends Controller
{
    // 查询
    public function index(Request $request) {
        try {
            $page = $request->get('page');

            $validate = Validate::make([
                'page'=> 'require|number'
            ]);
            $data = ['page'=> $page];
            if (!$validate->check($data)) {
                return json(['code'=> 200, 'msg'=> $validate->getError()]);
            }

            $res = FriendLinkModel::select_all($page);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=> $res]);
        } catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 查询单个
    public function find(Request $request) {
        try{
            $id = $request->get('id');

            $validate = Validate::make([
                'id'=> 'require|number'
            ]);
            $data = ['id'=> $id];
            if (!$validate->check($data)) {
                return json(['code'=> 200, 'msg'=> $validate->getError()]);
            }

            $res = FriendLinkModel::find_link($id);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=> $res]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 搜索
    public function search(Request $request) {
        try{
            $title = $request->get('title');

            $validate = Validate::make([
                'title'=> 'require'
            ]);
            $data = ['title'=> $title];
            if (!$validate->check($data)) {
                return json(['code'=> 200, 'msg'=> $validate->getError()]);
            }

            $res = FriendLinkModel::search_link($title);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '搜索失败']);
            }
            return json(['code'=> 200, 'msg'=> '搜索成功', 'data'=> $res]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 删除
    public function remove(Request $request) {
        try{
            $id = $request->get('id');

            $validate = Validate::make([
                'id'=> 'require|number'
            ]);
            $data = ['id'=> $id];
            if (!$validate->check($data)) {
                return json(['code'=> 200, 'msg'=> $validate->getError()]);
            }

            $res = FriendLinkModel::remove_link($id);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '删除失败']);
            }
            return json(['code'=> 200, 'msg'=> '删除成功']);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 添加
    public function insert(Request $request) {
        $link = $request->post();

        $linkValidate = new FriendLinkValidate();
        if (!$linkValidate->check($link)) {
            return json(['code'=>400, 'msg'=> $linkValidate->getError()]);
        }

        $res = FriendLinkModel::insert_link($link);
        if (!$res) {
            return json(['code'=> 201, 'msg'=> '添加失败']);
        }
        return json(['code'=> 200, 'msg'=> '添加成功']);
    }

    // 更新
    public function update(Request $request) {
        $id = $request->get('id');
        $link = $request->post();

        $idValidate = Validate::make(['id'=>'require|number']);
        $idData = ['id'=>$id];
        if (!$idValidate->check($idData)) {
            return json(['code'=>400, 'msg'=>$idValidate->getError()]);
        }
        $linkFriend = new FriendLinkValidate();
        if (!$linkFriend->check($link)) {
            return json(['code'=>400, 'msg'=>$linkFriend->getError()]);
        }

        $res = FriendLinkModel::update_link($id, $link);
        if (!$res){
            return json(['code'=>201, 'msg'=>'修改失败']);
        }
        return json(['code'=>200, 'msg'=>'修改成功']);
    }
}
