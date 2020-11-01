<?php

namespace app\admin\validate;

use think\Validate;

class ClassifyValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title' => 'require',
        'desc' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title' => '标题不能为空',
        'desc' => '描述不能为空'
    ];
}
