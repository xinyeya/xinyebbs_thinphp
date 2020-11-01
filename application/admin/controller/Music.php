<?php

namespace app\admin\controller;

use app\admin\model\MusicModel;
use app\admin\validate\MusicValidate;
use think\Controller;
use think\Exception;
use think\Request;
use think\Validate;

class Music extends Controller
{
    // 查询所有数据
    public function index(Request $request) {
        try {
            $page = $request->get("page");

            // 验证数据合法性
            $validate = Validate::make([
                'page' => "require|number"
            ]);
            $data = [
                'page'=>$page
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 400, 'msg'=> $validate->getError()]);
            }

            // 获取数据
            $res = MusicModel::select_all($page);
            if (!$res) {
                return json(['code'=>201, 'smg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=>$res]);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务端错误']);
        }
    }

    // 查询单条数据
    public function find(Request $request) {
        try {
            $id = $request->get("id");

            // 验证数据合法性
            $validate = Validate::make([
                'id' => "require|number"
            ]);
            $data = [
                'id'=>$id
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 400, 'msg'=> $validate->getError()]);
            }

            // 获取数据
            $res = MusicModel::find_music($id);
            if (!$res) {
                return json(['code'=>201, 'smg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=>$res]);
        } catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务端错误']);
        }
    }

    // 搜索数据
    public function search(Request $request) {
        try {
            $title = $request->get("title");

            // 验证数据合法性
            $validate = Validate::make([
                'title'=> 'require|max:100'
            ]);
            $data = [
                'title'=> $title
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 200, 'msg'=>$validate->getError()]);
            }

            // 获取数据
            $res = MusicModel::search_music($title);

            if (!$res) {
                return json(['code'=> 201, 'msg'=> '查询失败']);
            }
            return json(['code'=> 200, 'msg'=> '查询成功', 'data'=> $res]);
        } catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务端错误']);
        }
    }

    // 删除数据
    public function remove(Request $request) {
        try {
            $id = $request->get("id");

            // 验证数据合法性
            $validate = Validate::make([
                'id' => "require|number"
            ]);
            $data = [
                'id'=>$id
            ];
            if (!$validate->check($data)) {
                return json(['code'=> 400, 'msg'=> $validate->getError()]);
            }

            // 获取数据
            $res = MusicModel::remove_music($id);
            if (!$res) {
                return json(['code'=>201, 'smg'=> '删除失败']);
            }
            return json(['code'=> 200, 'msg'=> '删除成功']);
        }catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务端错误']);
        }
    }

    // 添加数据
    public function insert(Request $request) {
        try {
            $data = $request->post();

            // 验证数据是否合法
            $musicValidate = new MusicValidate();
            if (!$musicValidate->check($data)) {
                return json(['code'=> 400, 'msg'=> $musicValidate->getError()]);
            }

            // 写入数据
            $res = MusicModel::insert_music($data);
            if (!$res) {
                return json(['code'=> 201, 'msg'=> '添加失败']);
            }
            return json(['code'=> 200, 'msg'=> '添加成功']);
        } catch (Exception $e) {
            return json(['code'=> 500, 'msg'=> '服务器错误']);
        }
    }

    // 更新数据
    public function update(Request $request) {
        $id = $request->get("id");
        $music = $request->post();

        $validate = Validate::make([
            'id' => 'require|number'
        ]);

        $data = [
            'id' => $id
        ];

        if (!$validate->check($data)) {
            return json(['code'=> 400, 'msg'=> $validate->getError()]);
        }

        // 验证数据是否合法
        $musicValidate = new MusicValidate();
        if (!$musicValidate->check($music)) {
            return json(['code'=> 400, 'msg'=> $musicValidate->getError()]);
        }

        // 写入数据
        $res = MusicModel::update_music($id, $music);
        if (!$res) {
            return json(['code'=> 201, 'msg'=> '修改失败']);
        }
        return json(['code'=> 200, 'msg'=> '修改成功']);
    }

    // 上传图片
    public function image_file(Request $request) {
        try {
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('music_image');
            // 移动到框架应用根目录/uploads/ 目录下
            $info = $file->validate(['ext'=>'jpg,jpeg,png'])->move( '../public/static/uploads/admin/music/image');
            if($info){
                // 成功上传后 获取上传信息
                return json(["code"=>200, "msg"=>"上传成功","data"=>$_SERVER['SERVER_NAME']."/static/uploads/admin/music/image/".$info->getSaveName()]);
            }else{
                // 上传失败获取错误信息
                return json(["code"=>500, "msg"=>$file->getError()]);
            }
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>'服务器错误']);
        }
    }

    // 上传音乐文件
    public function music_file(Request $request) {
        try{
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('music_file');
            // 移动到框架应用根目录/uploads/ 目录下
            $info = $file->validate(['ext'=>'mp3,flac'])->move( '../public/static/uploads/admin/music/file');
            if($info){
                // 成功上传后 获取上传信息
                return json(["code"=>200, "msg"=>"上传成功","data"=>$_SERVER['SERVER_NAME']."/static/uploads/admin/music/file/".$info->getSaveName()]);
            }else{
                // 上传失败获取错误信息
                return json(["code"=>500, "msg"=>$file->getError()]);
            }
        }catch (Exception $e) {
            return json(["code"=>500, "msg"=>'服务器错误']);
        }
    }
}
