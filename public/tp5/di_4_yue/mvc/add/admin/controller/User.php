<?php 
	namespace add\admin\controller;
	use core\controller;
	use core\Upload;
	use core\Page;
	use add\admin\model\Mysql;
	class User extends controller
	{
		public function usera()
		{
			$this->get_html();
		}
		public function userlist()
		{
			// var_dump($_GET);die;---------------------------------------分页
			$p=empty($_GET['p'])?"1":$_GET['p'];
			$page_num=5;
			$first=($p-1)*$page_num;
			$ad=Mysql::getInstance('admin');
			$count=$ad->select('count(*) as nums')->where('c_name','like',$_GET['c_name'])->query_fetch(1);
			$total=ceil($count['nums']/$page_num);

			$url=$_SERVER['REQUEST_URI'];
			if(strrpos($url,'&p')){
				$strart=strrpos($url,'&');
				$url=substr($url,0,$strart);
			}
			$page = new Page($url);

			//$page= new Page("index.php?m=admin&c=User&a=userlist");
			$page_str=$page->fixedPage($p,$total);
			if(empty($_GET['c_name'])){
				 $list =$ad->select('*')->limit($first,$page_num)->query_fetch(2);
			}else{
				 $list =$ad->select('*')->where('c_name','like',$_GET['c_name'])->limit($first,$page_num)->query_fetch(2);
			}

			
			$this->assign('list',$list);
			$this->assign('page_str',$page_str);
			// var_dump($list);			
			$this->get_html();

		}

		public function userb()
		{
			// var_dump($_FILES);exit();
			$up = new Upload($_FILES['photo']);
			$status = $up->moveFile();
			if($status){
				$_POST['photo']=$up->path.'/'.$up->file_name;
			}
			$ad=Mysql::getInstance('admin');
			$x =$ad->add($_POST)->query();
			if($x){
				echo "添加成功";
				header("refresh:2;url='index.php?m=admin&c=User&a=userlist'");
			}
		}
		public function del()
		{
			$c_id=$_GET['c_id'];
			$ad=Mysql::getInstance('admin');
			$x =$ad->delete()->where('c_id','=',$c_id)->query();
			if($x){
				echo "<script>alert('删除成功');location.href='index.php?m=admin&c=User&a=userlist'</script>";
			}
		}
		public function update()
		{
			
			$c_id=empty($_GET['c_id'])?1:$_GET['c_id'];
			$ad=Mysql::getInstance('admin');
			$info =$ad->select('*')->where('c_id','=',$c_id)->query_fetch(1);
			$this->assign('info',$info);
			$this->get_html();
			// var_dump($list);
		}
		public function update_do()
		{
			$c_id=empty($_POST['c_id'])?1:$_POST['c_id'];
			$ad=Mysql::getInstance('admin');
			$info =$ad->update($_POST)->where('c_id','=',$c_id)->query();
			if($info){
				echo "<script>alert('修改成功');location.href='index.php?m=admin&c=User&a=userlist'</script>";
			}	
		}
		
	}









 ?>