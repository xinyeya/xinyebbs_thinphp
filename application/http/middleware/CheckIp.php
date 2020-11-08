<?php

namespace app\http\middleware;

use think\Db;
use think\facade\View;

class CheckIp
{
    public function handle($request, \Closure $next)
    {
        $ip = getIP();
//        $is_ip = Db::table('bbs_pv')
//            ->field('ip')
//            ->where('ip', $ip)
//            ->find();
//        if (!$is_ip) {
            Db::table('bbs_pv')
                ->insert(['ip'=> $ip]);
//        }
        $pv_count = Db::table('bbs_pv')->count();
        View::share(['pv_count'=>$pv_count]);
        return $next($request);
    }
}
