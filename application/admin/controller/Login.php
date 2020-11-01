<?php

namespace app\admin\controller;

use app\admin\model\LoginModel;
use app\admin\validate\LoginValidate;
use Firebase\JWT\JWT;
use think\Controller;
use think\Request;

class Login extends Controller
{
    // 登录验证
    public function index(Request $request) {
        $username = $request->post("username");
        $password = $request->post("password");

        // 验证数据是否合法
        $loginValidate = new LoginValidate();
        $rule = ['username'=> $username, 'password'=>$password];
        if(!$loginValidate->check($rule)) {
            return json(['code'=> 400, 'msg'=> $loginValidate->getError()]);
        }

        // 获取数据
        $res = LoginModel::index($username, $password);
        if (!$res) {
            return json(['code'=>201, 'msg'=>'用户名或密码错误']);
        }

        $token = $this->createToken($res);

        $res['token'] = $token;

        unset($res['password']);

        return json(['code'=>200, 'msg'=>'登录成功', 'data'=>$res]);
    }

    /**
     * 生成token
     * @param $userInfo
     * @return mixed
     */
    private function createToken($userInfo) {
        // 引用config 下的 jwt.php
        $key = config('jwt.key');// 这里是自定义的一个随机字串，应该写在config文件中的，解密时也会用

        $jwtData = [
            "iss" => "xinye", // 签发者 可以为空
            "aud" => "admin", // 面象的用户，可以为空
            "iat" => config('jwt.lat'),
            "nbf" => config('jwt.nbf'), // 在什么时候jwt开始生效
            "exp" => config("jwt.exp"), // token过期时间
            "uid" => $userInfo['id'], // 记录着userid的信息，这里是自己添加上去的，如果有其他信息，可以再添加数组的键
            "username" => $userInfo['username']
        ];

        $jwtToken = JWT::encode($jwtData, $key, 'HS256');

        return $jwtToken;
    }
}
