<?php
	class Mysql
	{
		public $name="root";
		public $pwd = "";
		public $ku = 'ada';
		public $host = '127.0.0.1';

		public $link;

		public $sql;
		//public $where;
		public function __construct()//link()
		{
			$this->link = mysqli_connect($this->host,$this->name,$this->pwd,$this->ku);
		}
		
		//a查询方法
		/*public function select($table,$field,$where,$order)
		{
			$sql = "select $field from $table $where $order";
			$res = mysqli_query($this->link,$sql);
			$arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
			return $arr;
		}*/
		//查询方法
		public function select($table,$field)
		{
			$this->sql = "select $field from $table ";

			return $this;
		}
		//定义条件判断
		public function where($field,$biaodashi,$value)
		{
			if(in_array( $biaodashi,['=','>','<','>=','<=','!=','<>'])){
				$this ->sql .= " where $field $biaodashi $value ";
			}elseif($biaodashi == 'like'){
				$this->sql .= " where $field like '%$value%' ";
			}elseif($biaodashi == 'in'){
				$this->sql .= " where $field in($value)";
			}elseif($biaodashi == 'between'){
				$this->sql .= " where $field between $value";
			}else{
				
			}
			return $this;
		} 

		public function limit($start,$length)
		{
			$this->sql .= " limit $start,$length ";
			return $this;
		}

		public function order($field,$sort='asc')
		{
			$this->sql .= " order by  $field $sort ";
			return $this;
		}
		//执行查询请求并抽取结果集
		public function query_fetch($type=1)
		{
			$res = mysqli_query($this->link,$this->sql);
			if($type==1){
				$arr = mysqli_fetch_assoc($res);
			}else{
				$arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
			}
			
			return $arr;
			//return $res;
		}

		//public function join($type,)
		// 添加方法
		public function add($table,$data)//升级的余地
		{
			$field = array_keys($data);  //这里是把，表单的name 拿出来当字段
			$values = array_values($data); //这里是把，表单的value 拿出来当插入的值
			$field = implode(',',$field); //数据是数组，拼接成字符串
			$values = implode("','",$values); //数据是数组，拼接成字符串
			$sql = "insert into $table ($field) values('$values')"; //拼接sql
			$status = mysqli_query($this->link,$sql);
			return $status;
		}
		public function update($table,$data)
		{
			// update admin set k=v,k=v where id=1;
			$this->sql = "update $table set ";
			foreach($data as $k=>$v){
				$this->sql .=" $k = '$v',";
			}
			$this->sql = trim($this->sql,',');
			return $this;
		}

		public function query()
		{
			$status = mysqli_query($this->link,$this->sql);
			return $status;
		}

		public function delete($table)
		{
			$this->sql = " delete from $table ";
			return $this;
		}
	}