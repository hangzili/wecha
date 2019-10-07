<?php 
	class mysq
	{
		public $lin='127.0.0.1';
		public $ming='root';
		public $pwd='';
		public $ku="ada";
		public $link;
		public $sql;
		private static $obj;
		protected function __construct()
		{
		 	$this->link=mysqli_connect($this->lin,$this->ming,$this->pwd,$this->ku);
		 }
		 public function xxoo()
		 {
		 	if(self::$obj==""){
		 		self::$obj=new mysq;
		 		return self::$obj;
		 	}else{
		 		return self::$obj;
		 	}
		 }

		/*public function __construct(){
	
			$this->link=mysqli_connect($this->lin,$this->ming,$this->pwd,$this->ku);
		}*/
		public function add($biao)
		{
			$field=array_keys($_POST);
			$values=array_values($_POST);
			$values=implode("','",$values);
			$field=implode(',',$field);
			$sql=" insert into $biao($field) values('$values')";
			$res=mysqli_query($this->link,$sql);
			return $res;
		}
		public function adda($tiaojiann,$biaoming)
		{
			$this->sql=" select $tiaojiann from $biaoming";
			return $this;
		}
		public function where($field,$biaodashi,$value)
		{
			if(in_array( $biaodashi,['=','>','<','>=','<=','!=','<>'])){
				$this ->sql .= " where $field $biaodashi $value ";
			}else if($biaodashi == 'like'){
				$this->sql .= " where $field like '%$value%' ";
			}else{
				
			}
			
			return $this;
		} 
		public function limit($st,$stl)
		{
			$this->sql .= " limit $st,$stl";
			return $this;
		}
		public function orde($field,$sort)
		{
			$this->sql .= " order by  $field $sort ";
			return $this;
		}
		public function query($abcde)
		{
			$res=mysqli_query($this->link,$this->sql);
			if($abcde==1){
				$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
				return $arr;
			}else{
				$arr=mysqli_fetch_assoc($res);
				return $arr;
			}
		}
		
		public function querya()
		{
			$status = mysqli_query($this->link,$this->sql);
			return $status;
		}
		public function update($table,$data)
		{
			$this->sql = "update $table set ";
			foreach($data as $k=>$v){
				$this->sql .=" $k= ' $v ',";
			}
			$this->sql = trim($this->sql,',');
			return $this;
		}
		public function del($table)
		{
			$this->sql = " delete from $table";
			return $this;
		}
	}
	




 ?>