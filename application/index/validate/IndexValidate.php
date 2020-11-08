<?php

namespace app\index\validate;

use think\Validate;

class IndexValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username' => 'require|max:30|token',
        'email' => "email",
        "content" => "require"
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require'=>'用户名不能为空',
        'user.max' => '用户名不能超过30个字符',
        'user.token' => '令牌验证失败',
        'email' => '邮箱格式不正确',
        'content'=> '评论内容不能为空'
    ];
}
