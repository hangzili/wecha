<?php
namespace core;
	class Page
	{
		public $p=1;
		public $total;
		public $start;
		public $end;
		public $url;
		public function __construct($url)
		{
			$this->url = $url; 
		}
		public function simplePage($p,$total)
		{
			$this->p = $p;
			$this->total= $total;
			$page_str = $this->get_page(1);
			$page_str .= $this->get_css();
			return $page_str;
		}

		public function numPage($p,$total)
		{
			$this->p = $p;
			$this->total= $total;
			$page_str = $this->get_page(2);
			$page_str .= $this->get_css();
			return $page_str;
			
		}

		public function fixedPage($p,$total)
		{
			$this->p = $p;
			$this->total= $total;
			$page_len = 9; //显示的页码个数
			$page_offset = ($page_len-1)/2 ;//页码偏移数
			if($page_len>=$total)  //你要显示的页码大于总页数
			{
				//起始页的变量
				$this->start = 1;
				//结束页的变量
				$this->end = $total;
			}else{ // 你要显示的页码不大于总页数
				if($p <= $page_offset){ //如果你要显示的前几个不大于偏移量的页码
					//起始页的变量
					$this->start = 1;  //从一开始
					//结束页的变量
					$this->end = $page_len; //到你显示的页码结束  这个时候也不需要计算页码的偏移
				}else{ //如果你要显示的页码大于偏移量的页码
					if($p+$page_offset>=$total){  //判断显示的页码有没有超出 总页码
						//起始页的变量
						$this->start = $total-$page_len+1;
						//结束页的变量
						$this->end = $total;
					}else{ //没超过，使用偏移量计算 	起始和结束页
						//起始页的变量
						$this->start = $p - $page_offset;
						//结束页的变量
						$this->end = $p + $page_offset;
					}
				}	
			}
			$page_str = $this->get_page(3);
			// $page_str .= $this->get_css();
			return $page_str;
			
		}

		public function get_page($type=1)
		{											
			//// 上一页的页码           
			$prev = $this->p-1;                 //-----------------------------------计算页码——》			if($prev <=0){
				$prev = 1;
			
			//下一页的页码
			$next = $this->p+1;
			if($next >$this->total){
				$next = $this->total;	
			}									//---------------------------------《计算页码
			$page_str = "<a href='".$this->url."&p=1'>首页</a>";     //------------------首页
			$page_str .= "<a href='".$this->url."&p=$prev'>上一页</a>";  //----------------上一页
			if($type==2){
				for($i=1;$i<=$this->total;$i++){
					if($i==$this->p){
						$page_str .= "<span >$i<span>";
					}else{
						$page_str .= "<a href='?p=$i'>$i</a>";
					}
				}
			}else if($type==3){
				for($i=$this->start;$i<=$this->end;$i++){
					// if($i==$this->p){
					// 	// $page_str .= "<span >$i<span>";
					// }else{
						$page_str .= "<a href='".$this->url."&p=$i'>$i</a>";
					//}
				}
			}
			$page_str .= "<a href='".$this->url."&p=$next'>下一页</a>";    //-------------------------下一页
			$page_str .= "<a href='".$this->url."&p=$this->total'>尾页</a>";  //----------------------尾页
			return $page_str;
		}

		public function get_css()
		{
			$css = '<style type="text/css">';
			$css .= '.fz_fy { height: 30px; line-height: 30px; margin: 0;padding:0; }';
			$css .= '.fz_fy li{ height: 30px; line-height: 30px; display: inline-block; border: 1px solid #000; margin: 0 4px; padding: 0 4px;}';
			$css .= '.fz_fy .curr{ border: 0; }';
			$css .= '.fz_fy li a{ text-decoration: none; color:#000; }';
			$css .= '</style>';
			return $css;
		}
	}