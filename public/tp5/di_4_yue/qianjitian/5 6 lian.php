<?php 
	class mys
	{
		public $lian="127.0.0.1";
		public $yong="root";
		public $mima="";
		public $ku="xo";
		public $biaoming;
		public $biaomin;
		public $liemin;
		public $zh;
		public function mysa()                                                //链接数据库
		{
			$link=mysqli_connect($this->lian,$this->yong,$this->mima,$this->ku);
			return $link;
		}
		public function res($link,$sql)                                        //执行的
		{
			$result=mysqli_query($link,$sql);
			return $result;
		}
		public function arr($result)                                            //从中取处一条
		{
			while($arr=mysqli_fetch_assoc($result)){
				$array[]=$arr;
			}
			return $array;
		}
		public function selec()                                               //查询
		{
			$sql="select * from $this->biaoming";
			return $sql;
		}
		public function inser()                                             //添加
		{
			$sql2="insert into $this->biaomin($this->liemin) values($this->zh)";
			return $sql2;
		}
	}

	$a=new mys;
	// $b=$a->biaoming="abc";
	 $link=$a->mysa();
	// $ress=$a->res($link,$a->selec());
	// $arr=$a->arr($ress);
	// var_dump($arr);
	//                                                添加
	//$b=$a->biaomin="abc";
	// $c=$a->liemin='n_name,n_title,n_body';
	// $d=$a->zh="'名字','a','c'";
	// $sql=$a->inser();
	// $arr=$a->res($link,$sql);

	//展示
	$b=$a->biaoming="abc";
	$sql=$a->selec();
	$result=$a->res($link,$sql);
	$arr=$a->arr($result);
	//var_dump($arr);


	
 ?>
 <table border="1">
 	<tr>
 		<td>名字</td>
 		<td>头</td>
 		<td>身体</td>
 	</tr>
 	<?php foreach($arr as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['n_name'] ?></td>
 		<td><?php echo $v['n_title'] ?></td>
 		<td><?php echo $v['n_body'] ?></td>
 	</tr>
 	<?php } ?>
 </table>
 