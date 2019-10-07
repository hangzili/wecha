<?php 
	class mysql
	{
		public $name="root";
		public $pwd = "";
		public $ku = 'ada';
		public $host = '127.0.0.1';
		public $link;
		public $sql;
		public static $table;
		public function __construct()
		{
			$this->link = mysqli_connect($this->host,$this->name,$this->pwd,$this->ku);
		}
		function inser($date)
		{
			$field=array_keys($date);
			$value=array_values($date);
			$field=implode(",",$field);
			$value=implode("','",$value);
			$this->sql = " insert into ".self::$table. "($field) values('$value')";
			return $this;
		}
		
		function selec($tiaojian)
		{
			$this->sql= " select $tiaojian from"." ".self::$table;
			return $this;
		}
		function quer()
		{
			$status = mysqli_query($this->link,$this->sql);
			return $status;
		}
		function que($type=1)
		{
			if($type==1){
			$status = mysqli_query($this->link,$this->sql);
			$res=mysqli_fetch_assoc($status);
			return $res;
			}else{
			$status = mysqli_query($this->link,$this->sql);
			$res=mysqli_fetch_all($status,MYSQLI_ASSOC);
			return $res;
			}
		}
		function limit($start,$length)
		{
			$this->sql .= " limit $start,$length ";
			return $this;
		}
		function order($field,$sorc='asc')
		{
			$this->sql .= " order by $field $sorc ";
			return $this;
		}
		function where($field,$biaodashi,$value)
		{
			if(in_array( $biaodashi,['=','>','<','>=','<=','!=','<>'])){
				$this ->sql .= " where $field $biaodashi $value ";
			}elseif($biaodashi == 'like'){
				$this->sql .= " where $field like '%$value%' ";
			}elseif($biaodashi == 'in'){
				$this->sql .= " where $field in($value)";
			}elseif($biaodashi == 'between'){
				$this->sql .= " where $field between $value";
			}
			return $this;
		}
		function del()
		{
			$this->sql = "delete from " .self::$table. " " ;
			return $this;
		}
	}







 ?>