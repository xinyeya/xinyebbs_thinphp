<?php

namespace app\admin\validate;

use think\Validate;

class ArticleValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title'  =>  'require|max:100',
        'desc' =>  'require',
        'labels' => 'require',
        'content' => 'require',
        'image' => 'require',
//        'user_id' => 'require|number',
        'classify_id' => 'require|number'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require' => '标题不能为空',
        'title.max' => '标题最大不能超过100个字符',
        'desc.require' => '简介不能为空',
        'labels.require' => '标签不能为空',
        'content.require' => '内容不能为空',
        'image.require' => '图片路径不能为空',
//        'user_id.require' => '作者id不能为空',
//        'user_id.number' => '作者id必须是数字',
        'classify_id.require' => '分类id不能为空',
        'classify_id.number' => '分类id必须是数字'
    ];
}
