<?php
	class Page
	{
		public $p=1;
		public $total;
		public $start;
		public $end;
		public function simplePage($p,$total,$type=1)
		{
			$this->p=$p;
			$this->total=$total;
			$prev = $p-1;
			if($prev<=0){
				$prev=1;
			}
			$end = $p-1;
			if($end>=$total){
				$end=$total;
			}
			$page_str = "<ul>";
			$page_str .= "<li><a href='?p=1'>首页</a></li>";
			$page_str .= "<li><a href='?p=$prev'>上一页</a></li>";
			if($type==1){
				for($i=1;$i<=$total;$i++){
					$page_str .= "<li><a href='?p=$i'> $i </a></li>";
				} 
			}else{
				for($i=$this->start;$i<=$this->end;$i++){
					$page_str .= "<li><a href='?p=$i'> $i </a></li>";
				} 
			}
			$page_str .= "<li><a href='?p=$end'>下一页</a></li>";
			$page_str .= "<li><a href='?p=$total'>尾页</a></li>";
			$page_str .= "</ul>";
			return $page_str;
		}
		public function fixedPage()
		{
			$this->p=$p;
			$this->total=$total;
			$pag_len=5;
			$page_offset=($pag_len-1)/2;
			if($pag_len>$total){
				$this->start = "1";
				$this->end="$total";
			}else{
				if($p<=$this->pag_len){
					$this->start = "1";
					$this->end="$page_offset";
				}else{
					if($p+$page_offset>=$total){
						$this->start = "$total-$pag_len+1";
						$this->end="$total";
					}else{
						$this->start = "$pag_len-$page_offset";
						$this->end="$pag_len+$page_offset";
					}
					
				}
			}
			return $this->start;
		}

	}
			

	












 ?>