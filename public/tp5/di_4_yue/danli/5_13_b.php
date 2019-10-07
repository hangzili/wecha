<?php 
	class Page
	{
		public $p=1;
		public $total;
		public $start;
		public $end;
		public function simplePage($p,$total)
		{
			$this->p = $p;
			$this->total= $total;
			$page_str=$this->get_page(1);
			return $page_str;
		}
		public function numPage($p,$total)
		{
			$this->p = $p;
			$this->total= $total;
			$page_str=$this->get_page(2);
			return $page_str;
		}
		public function fixedPage($p,$total)
		{
			$page_len=5;
			$page_offset=($page_len-1)/2;
			if($page_len>=$total){
				$this->start=1;
				$this->end=$total;
			}else{
				if($p<=$page_offset){
					$this->start=1;
					$this->end=$page_len;
				}else{
					if($page_offset+$p>=$total){
						$this->start=$total-$page_len+1;
						$this->end=$total;
					}else{
						$this->start=$p-$page_offset;
						$this->end=$p+$page_offset;
					}
				}
			}
			$this->p = $p;
			$this->total= $total;
			$page_str=$this->get_page(3);
			return $page_str;
		}
		public function get_page($type=1)
		{
			$p=$this->p;
			$total=$this->total;
			$prev = $p-1;
			if($prev <=0){
				$prev =1;
			}
			$next = $p+1;
			if($next >=$total){
				$next =$total;
			}
			$page_str = "<ul>";
			$page_str .= "<li><a href='?p=1'>首页</a></li>";
			$page_str .= "<li><a href='?p=$prev'>上一页</a></li>";
				if($type==2){
						for($i=1;$i<=$this->total;$i++){
					$page_str .= "<li><a href='?p=$i'>$i</a></li>";
												}
							}else if($type==3){
					for($i=$this->start;$i<=$this->end;$i++){
								$page_str .= "<li><a href='?p=$i'>$i</a></li>";
								}
							}
		
			$page_str .= "<li><a href='?p=$next'>下一页</a></li>";
			$page_str .= "<li><a href='?p=$total'>尾页</a></li>";
			$page_str .= "</ul>";
			return $page_str;
		}
	}









 ?>