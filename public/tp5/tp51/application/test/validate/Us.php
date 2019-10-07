<?php

namespace app\test\validate;

use think\Validate;

class Us extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
            'u_name'=>['require','unique:usera'],
            'age'=>['require','max:120'],
            'tel'=>['require','mobile'],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
            'u_name.require'=>'用户名不能为空',
            'u_name.unique'=>'用户名重复',
            'age.require'=>'年龄必填',
            'age.max'=>'年龄不能大于20',
            'tel.require'=>'手机号必填',
            'tel.mobile'=>'手机号格式不对',
    ];
}
