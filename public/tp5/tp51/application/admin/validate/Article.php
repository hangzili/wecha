<?php

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
            //require 非空
            'a_title'=>['require','max:30'],
            'content'=>['require'],
            'a_man'=>['require'],
            'cid'=>['require','number','gt:0'],
            'tag_ids'=>['require'],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'a_title.require'=>'标题必填',
        'a_title.max'=>'标题长度不能超过30',
        'content.require'=>'内容必填',
        'a_man.require'=>'添加人必填',
        'cid.require'=>'分类必填',
        'cid.number'=>'分类必须为数字',
        'cid.gt'=>'选择正确的分类',
        'tag_ids.array'=>'标签必填',
    ];
}
