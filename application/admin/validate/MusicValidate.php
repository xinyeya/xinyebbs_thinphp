<?php

namespace app\admin\validate;

use think\Validate;

class MusicValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title' => 'require|max:100',
        'author' => 'require|max:100',
        'image' => 'require',
        'file_path' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require' => '标题不能为空',
        'title.max' => '标题最多不能超过100个字符',
        'author.require' => '作者名不能为空',
        'author.max' => '作者名不能超过100个字符',
        'image.require' => '封面图不能为空',
        'file_path.require' => '音乐文件不能为空'
    ];
}
