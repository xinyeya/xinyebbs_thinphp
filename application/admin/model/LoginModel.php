<?php

namespace app\admin\model;

use think\Exception;
use think\Model;
use think\model\concern\SoftDelete;

class LoginModel extends Model
{
    protected $table = "bbs_user";

    use SoftDelete;
    protected $deleteTime = "delete_time";

    public static function index($username, $password) {
        $data = LoginModel::where('username', $username)->find();
        if (!$data) {
            return false;
        }

        if ($data['password'] != md5($password)) {
            return false;
        }

        return $data;
    }
}
