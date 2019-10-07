<?php
//公共函数
// 处理分类数据，在后台任何控制器都能调用
//库里已经有的数据，从哪里开始查，分类缩进的定义
function CreateTree($info,$parent_id=0,$level=1){
     //1.静态定义一个容器，不是静态的 数据会丢失
    static $new_arr = [];//定义一个空新数组
    //2.遍历数据一条条对比
    foreach($info as $k=>$v){
        //3.找数据库里parent_id = 0;
        // var_dump($data);die;
        if($v['parent_id']==$parent_id){
            $v['level']= $level;//增加级别字段。把分类缩进放进新的数组,
            //4.找到之后 放到新数组里
            $new_arr[]=$v;
            //5.调用程序自身递归找子集
            CreateTree($info,$v['cate_id'],$level+1);//记得加上分类缩进+1
        }
    }
     // 6.return 返回容器
    return $new_arr;
}




?>
