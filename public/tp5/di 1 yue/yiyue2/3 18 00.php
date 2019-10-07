<?php
	header('content-type:text/html;charset=utf-8');
	/*$a=array(
		array('张三','男',19),
		array('李四','女',20),
		array('王五','女',21),
	);*/

	//print_r ($a);

	//增
		//$a[3]=array('赵六','男',29);$a[]=(('赵六','男',29)
		//print_r ($a);
	//删
		//unset($a[1]);
		//print_r ($a);
	//改
		//$a[1]=array('赵六','男',29);
		//print_r ($a);
	//查
		//print_r ($a[1]);
		//echo $a[0][1];
		/*$a=array(
			array('name'=>'张三','age'=>12),
			array('name'=>'王五','age'=>13),
			array('name'=>'赵六','age'=>14),
		);*/
		//print_r ($a);

	//增
		//$a[3]=array('name'=>'面膜','age'=>100);
		//print_r ($a);

	//删
		//unset($a[1]);
		//print_r ($a);

	//改
		//$a[0]=array('name'=>'面膜','age'=>100);
		//print_r ($a);

	//查
		//print_r ($a[2]);
		/*$d=array(
			array('xing'=>'赵','ming'=>'输'),
			array('xing'=>'钱','ming'=>'瑞'),
			array('xing'=>'孙','ming'=>'图'),
			array('xing'=>'李','ming'=>'报'),
		);*/
	//检测变量是否是数组
		//$a=array('aaaa','bbbb','cccc');
		//$b=is_array($q);
		//var_dump ($b);
	//将一个字符串分割成一个数组
		//$q='姓名,年龄';
		//$w=explode(',',$q);
		//print_r ($w);
		           //输出Array ( [0] => 姓名 [1] => 年龄 ) 
	//将一个字符串连成字符串
		//$q=array('rqqqq','wwwww','eeeee');
		//$w=implode($q);
		//print_r ($w);
	//检测一个值是否存在另一个数组
		//$q=array('a','b','c','s');
		//$a=in_array('h',$q);
		//var_dump ($a);
	//获取数组的键名
		//$q=array('qq','ww','ee');
		//print_r (array_keys($q));
	//获取数组的值
		//$q=array('qq','ww','ee');
		//$e=array_values($q);
		//print_r ($e);
	//合并一个或多个值
		//$q=array('qq','ww','ee');
		//$w=array('a','b','c','s');
		//$r=array_merge($q,$w);
		//print_r ($r);	

?>
<!-- <table border="1">
	<tr>
		<td>姓名</td>
		<td>年龄</td>
	</tr>
	<tr><?php foreach ($a as $r=>$t) { ?>
		<td><?php echo $t['name']?></td>
		<td><?php echo $t['age']?></td>
	</tr><?php } ?>
</table>
 -->
 <!-- <table border="1 ">
 	<tr>
 		<td>姓</td>
 		<td>名</td>
 	</tr><?php foreach ($d as $b=>$n) { ?>
 	<tr>
 		<td><?php echo $n['xing']?></td>
 		<td><?php echo $n['ming']?></td>
 	</tr><?php }?>
 </table> -->