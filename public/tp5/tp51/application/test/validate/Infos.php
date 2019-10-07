<?php

namespace app\test\validate;

use think\Validate;

class Infos extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
            // 'num'=>['unique.info'],
            'tel'=>['number','length:11'],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
            // 'num.unique'=>'车牌不能重复',
            'tel.number'=>'手机号为纯数字',
            'tel.length'=>'长度为11位',
    ];
}
