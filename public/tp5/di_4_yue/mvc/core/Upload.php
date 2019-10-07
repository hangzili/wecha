<?php
	namespace core;
	class Upload
	{
		public $img;
		public $ext;
		public $file_name;
		public $path;
		public function __construct($img)
		{
			$this->img = $img;
			$this->isError();
			$this->isUploadFile();
			$this->isSize();
			$this->isType();
		}

		//错误号的判断
		public function isError()
		{
			switch ($this->img['error']) {
				case 1:
					die('上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值');
					break;
				case 2:
					die('上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值');
					break;
				case 3:
					die('文件只有部分被上传!');
					break;

				case 4:
					die('没有文件被上传。');
					break;

				case 6:
					die('找不到临时文件夹。');
					break;
				case 7:
					die('文件写入失败。');
					break;
				default:
					# code...
					break;
			}
			return $this;
		}

		//文件大小判断
		public function isSize()
		{
			if($this->img['size']>100000)
			{
				die('文件太大');
			}
			return $this;
		}

		//文件类型判断

		public function isType()
		{
			//取文件的后缀
			$start = strrpos($this->img['name'], '.')+1;
			$this->ext = substr($this->img['name'],$start);

			if(!in_array($this->ext ,['jpeg','png','jpg'])){
				die('文件类型不正确！');
			}
			return $this;
		}

		//起名
		public function newFileName()
		{
			$this->file_name = time().'.'.$this->ext;
			return $this;
		}

		public function path()
		{
			$this->path = './images/'.date('Ymd');
			if(!file_exists($this->path))
			{ //4 执行  2 读 1 写
				mkdir($this->path,0777,true);
			}

			return $this;
		}
		public function isUploadFile()
		{
			if(!is_uploaded_file($this->img['tmp_name'])){
				die('文件不是通过文件上传');
			}
			return $this;
		}
		public function moveFile()
		{
			$this->path();
			$this->newFileName();
			$status = move_uploaded_file($this->img['tmp_name'], $this->path.'/'.$this->file_name);

			return $status;
		}
	}