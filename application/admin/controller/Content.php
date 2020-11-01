<?php

namespace app\admin\controller;

use app\admin\model\ContentModel;
use app\admin\model\MusicModel;
use think\Controller;
use think\Exception;
use think\Request;
use think\Validate;

class Content extends Controller
{
    // 查询留言
    public function index(Request $request) {
        try {
            $page = $request->get('page');

            $validate = Validate::make([
                'page'=> 'require|number'
            ]);
            $data = [
                'page'=>$page
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 400, 'msg'=> $validate->getError()]);
            }

            $res = ContentModel::select_all($page);

            if (!$res) {
                return json(['code'=> 200, 'msg'=> '搜索失败']);
            }
            return json(['code'=> 200, 'msg'=> '搜索成功', 'data'=> $res]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 搜索留言
    public function search(Request $request) {
        try{
            $username = $request->get('username');

            $res = ContentModel::search_content($username);

            if (!$res) {
                return json(['code'=> 201, 'msg'=> '搜索失败']);
            }
            return json(['code'=> 200, 'msg'=> '搜索成功', 'data'=> $res]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 删除留言
    public function remove(Request $request) {
        try {
            $id = $request->get('id');

            $validate = Validate::make([
                'id'=> 'require|number'
            ]);
            $data = [
                'id'=>$id
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 400, 'msg'=> $validate->getError()]);
            }

            $res = ContentModel::remove_content($id);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '删除失败']);
            }
            return json(['code'=> 200, 'msg'=> '删除成功']);
        }catch (Exception $e){
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }
}
