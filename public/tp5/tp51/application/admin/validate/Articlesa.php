<?php

namespace app\admin\validate;

use think\Validate;

class Articlesa extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
            'title'=>['require','max:50','chsDash'],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
            'title.require' => '标题不能为空',
            'title.max' => '长度不能大于50',
            'title.chsDash' => '格式不对', 
    ];
}
