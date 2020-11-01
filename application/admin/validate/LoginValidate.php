<?php

namespace app\admin\validate;

use think\Validate;

class LoginValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username' => 'require|max:32',
        'password' => 'require|max:100'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require' => '用户名不能为空',
        'username.max' => '用户名最多不能超过32个字符',
        'password.require' => '密码不能为空',
        'password.max' => '密码最大不能超过100个字符'
    ];
}
