<?php

namespace app\admin\validate;

use think\Validate;

class Cat extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
            'namee'=>['require', 'max' => 25],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'namee.require'=>'不能为空'，
        'namee.max'=>'错误'，
    ]; 
}
