<?php 
	class tu
	{
		public $img;
		public $ext;
		public $file_name;
		public $path;
		public function __construct($img)
		{
			//$this->img;
			$this->iserror();
			$this->issize();
			$this->img = $img;
			//$this->isError();
			$this->isUploadFile();
			//$this->isSize();
			$this->isType();
		}
		public function iserror()
		{
			switch ($this->img['error']) {
				case '1':
					echo "文件上传失败";
					break;
					case '2':
					echo "文件上传失败";
					break;
					case '3':
					echo "文件上传失败";
					break;
					case '4':
					echo "文件上传失败";
					break;
					case '6':
					echo "文件上传失败";
					break;
					case '7':
					echo "文件上传失败";
					break;
				default:
					break;
				}
				return $this;
		}
		function issize()
		{
			if($this->img['size']>100000000){
				die("上传文件不能太大") ;
			}
			return $this;
		}
		function istype()
		{
			$atart=strrpos($this->img['name'],'.')+1;
			$this->ext=substr($this->img['name'],$atart);
			if(!in_array($this->ext ,['jpeg','jpg','png'])){
				die("文件格式不对");
			}
			return $this;
		}
		function newFileName()
		{
			$this->file_name= time().'.'.$this->ext;
			return $this;
		}
		public function path()                       //----------------------path路径
		{
			$this->path = './images/'.date('Ymd');  //-----------------------------定义文件路径
			if(!file_exists($this->path))    //---------------------------------检测文件或目录是否存在
			{ //4 执行  2 读 1 写
				mkdir($this->path,0777,true);
			}

			return $this;
		}
		public function isUploadFile()
		{
			if(!is_uploaded_file($this->img['tmp_name'])){  //------判断文件是否上传
				die('文件不是通过文件上传');
			}
			return $this;
		}
		public function moveFile()
		{
			$this->path();
			$this->newFileName();
			$status = move_uploaded_file($this->img['tmp_name'], $this->path.'/'.$this->file_name);
													//---将文件移动到新位置  文件名 文件路径
			return $status;
		}
	}
	
	 // ["slogo"]=>
  // array(5) {
  //   ["name"]=>
  //   string(39) "56aea96600ff31c739f434a06792fabe_03.jpg"
  //   ["type"]=>
  //   string(10) "image/jpeg"
  //   ["tmp_name"]=>
  //   string(24) "D:\XAMPP\tmp\phpA97D.tmp"
  //   ["error"]=>
  //   int(0)
  //   ["size"]=>
  //   int(9776)






 ?>