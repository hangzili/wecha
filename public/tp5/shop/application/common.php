<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 封装添加成功和失败
function successly($font){
    $arr=['font'=>$font,'code'=>1];
    echo json_encode($arr);
}
function errorly($font){
    $arr=['font'=>$font,'code'=>2];
    echo json_encode($arr);exit;
}