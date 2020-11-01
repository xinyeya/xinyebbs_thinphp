<?php

namespace app\admin\validate;

use think\Validate;

class FriendLinkValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title'=> 'require|max: 32',
        'link' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require' => '标题不能为空',
        'title.max' => '标题最多不能超过32个字符',
        'link.require' => '链接不能为空'
    ];
}
