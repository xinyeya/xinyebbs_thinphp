<?php

namespace app\http\middleware;

use Exception;
use Firebase\JWT\JWT;
use think\Request;

class Auth
{
    public function handle(Request $request, \Closure $next)
    {
        try{
            $token = $request->header('tokenXinye');
            $Result = JWT::decode($token, config('jwt.key'),['HS256']);
            if (!$Result) {
                return json(['code'=> 401, 'msg'=> '请先登录']);
            }
            return $next($request);
        } catch (Exception $exception) {
            return json(['code'=> 401, 'msg'=> "你还没有令牌哦"]);
        }
    }
}
