<?php
	namespace add\admin\model;
	class Mysql
	{
		public static $name = "root";
		public static $pwd  = "";
		public static $ku   = "mvc";
		public static $host = "127.0.0.1";
		public static $table;
		protected $link;
		public $sql;
		private static $obj;
		
		private function __construct()
		{
			$this->link = mysqli_connect(self::$host,self::$name,self::$pwd,self::$ku);
		}
		
		public function __clone()
		{
			trigger_error('此对象禁止Clone',E_USER_ERROR);
		}
		public static function getInstance($table)
		{
			if(self::$obj==''){
				self::$obj = new self;
			}
			self::$table=$table;
			return self::$obj;
		}
		//查询方法
		public function select($field)
		{
			$this->sql = "select $field from ".self::$table." ";
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
		}
		// 添加方法
		public function add($data)//升级的余地
		{
			$field = array_keys($data);  //这里是把，表单的name 拿出来当字段
			$values = array_values($data); //这里是把，表单的value 拿出来当插入的值
			$field = implode(',',$field); //数据是数组，拼接成字符串
			$values = implode("','",$values); //数据是数组，拼接成字符串
			$this->sql = "insert into ".self::$table." ($field) values('$values')"; //拼接sql
			return $this;
		}
		public function update($data)
		{
			// update admin set k=v,k=v where id=1;
			$this->sql = "update ".self::$table." set ";
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

		public function delete()
		{
			$this->sql = " delete from ".self::$table." ";
			return $this;
		}
	}