<?php 
	class ada
	{
		public $namee='127.0.0.1';
		public $namer='root';
		public $namet="";
		public $namey='ada';
		public $sql;
		public $link;
		public function __construct()
		{
			$this->link= mysqli_connect($this->namee,$this->namer,$this->namet,$this->namey);
		}
		public function add($table,$date)
		{
			$value=array_values($date);
			$field=array_keys($date);
			$values=implode("','",$value);
			$field=implode(",",$field);
			$sql = " insert into $table ($field) values ('$values')";
			$res=mysqli_query($this->link,$sql);
			return $res;
		}
		public function select($tiao,$tablea)
		{
			$this->sql = "select $tiao from $tablea";
			return $this;
		}
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
		public function limit($tata,$tab)
		{
			$this->sql .= " limit $tata,$tab ";
			return $this;
		}

		public function quer($a)
		{
			$res = mysqli_query($this->link,$this->sql);
			if($a==1){
				$arr=mysqli_fetch_assoc($res);
			}else {
				$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
			}
			return $arr;
		}
		public function del($table)
		{
			$this->sql = "delete from $table";
			return $this;
		}
		public function querya()
		{
			$res = mysqli_query($this->link,$this->sql);
			return $res;
		}
		public function update($table,$data)
		{
			$this->sql = "update $table set ";
			foreach($data as $k=>$v){
				$this->sql .=" $k = '$v',";
			}
			$this->sql = trim($this->sql,',');
			return $this;
		 }
	}





































 ?>