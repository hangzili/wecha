<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Login extends Common
{
    /**注册页面 */
    public function register()
    {
        $this->view->engine->layout(false);
        return $this->fetch();
    }
    /**登录页面 */
   public function login()
   {
      $this->view->engine->layout(false);
      $refer=input('refer');
      $this->assign('refer',$refer);
      return $this->fetch();
   }
/**点击获取 */
   public function sendEmailCode()
   {
    // 接收邮箱的值
    $user_email = input('post.user_email');
    // 验证邮箱是否为空、格式、唯一性 (注意:js验证关闭掉)
    $reg = '/^[a-z]\w{6,18}@\d{3,5}(\.)|com|cn|net$/';
    if(empty($user_email)){
      // echo"邮箱不能为空";exit测试的时候用echo  用完后换成json
      errorly('邮箱不能为空');
    }
    if(!preg_match($reg,$user_email)){
     
      errorly('邮箱格式不正确');
    }else{
        $umodel = model('Users');
        $where=[
          ['user_email','=',$user_email]
        ];
         
        $count =$umodel->where($where)->count();
        //  dump($count);exit;

        if($count>0){
          errorly("此邮箱已经被注册");
        }
    }
    // dump($count);exit;
    //随机生成6个数字
    $code = createCode();
    // var_dump($code);exit;
    // 给当前的邮箱发送验证码
    $body="您的验证码为:".$code.",五分钟内有效，不要泄露他人.";
      // dump($body);exit;
    $res = sendEmail($user_email,"注册成功",$body);
    // dump($res);exit;
    if($res){
      //8.把邮箱、验证码、发送时间存储到session中
      session('userInfo',['user_email'=>$user_email,'user_code'=>$code,'send_time'=>time()]);
      successly('发送成功');
    }else{
      errorly('发送失败');
    }

   }
  //  检测session
   public function nate()
   {
    //  验证码 的是userInfo  登录 的session 是
      dump(cookie('ainfo'));
   }
/**点击注册 */
    public function registerdo()
   {
     $data = input('post.');//接收ajax传递过来的值
    //  var_dump($data);exit;
  
      /*①验证邮箱非空、格式、唯一性、验证当前邮箱与发送验证码的邮箱是否一致把上面的复制下来，稍加更改
      验证 验证码非空、当前输入验证码是否与session中验证码一致、当前时间-session中发送时间>300秒
      ③验证密码非空、数字字母组成6-18位
      ④验证确认密码非空、是否与密码一致*/

      // 验证接受的是手机注册还是邮箱注册
      if(array_key_exists('user_email',$data)){
        // 取出session 的值
        $userInfo = session('userInfo');
        
          if(empty($data['user_email'])){
            //  echo"邮箱不能为空";exit;//测试的时候用echo  用完后换成json
             errorly('邮箱不能为空');
          }
          // 验证邮箱是否为空、格式、唯一性 (注意:js验证关闭掉)
          $reg = '/^[a-z]\w{6,18}@\d{3,5}(\.)|com|cn|net$/';
          if(!preg_match($reg,$data['user_email'])){
            // echo"邮箱格式不正确";exit;
            errorly('邮箱格式不正确');
          }else{
              $umodel = model('Users');
              $where=[
                ['user_email','=',$data['user_email']]
              ];
              
              $count =$umodel->where($where)->count();
              //  dump($count);exit;

              if($count>0){
                // echo"此邮箱已经被注册";exit;
                errorly("此邮箱已经被注册");
              }
          }
          
          //②验证 验证码非空、当前输入验证码是否与session中验证码一致、当前时间-session中发送时间>300秒
          if(empty($data['user_code'])){
            // echo"验证码必填";exit;
            errorly("验证码必填");
          }
          if($data['user_code']!=$userInfo['user_code']){
            // echo"验证码 错误";exit;
            errorly('验证码错误');
          }
          if(time()-$userInfo['send_time']>300){
            // echo"验证码超时失效";exit;
            errorly('验证码超时5分钟失效');
          }
          // 验证当前邮箱与发送验证码的邮箱是否一致
          if($data['user_email']!=$userInfo['user_email']){
            // echo"当前邮箱与你发送验证码邮箱不一致";exit;
            errorly('当前邮箱与你发送验证码邮箱不一致');
          } 

          //密码验证
          if(empty($data['user_pwd'])){
            // echo"密码不能为空";exit;
            errorly('密码不能为空');
          }else if(strlen($data['user_pwd'])<6||strlen($data['user_pwd'])>15){
            // echo"密码要6-12位之间";exit;
            errorly('密码要6-12位之间');
          }
          if($data['user_pwd1']!=$data['user_pwd']){
            // echo"两次输入的密码不一致，检查一下";exit;
            errorly('两次输入的密码不一致，检查一下');
          }
      }else if(array_key_exists('user_tel',$data)){
        //验证手机号格式
        // 取出session 的值
        $userInfo = session('userInfo');
        if(empty($data['user_tel'])){
            // echo"电话不能为空";exit;//测试的时候用echo  用完后换成json
           errorly('电话不能为空');
        }
         
          $reg  = '/^1[345789]\d{9}$/';
          if(!preg_match($reg,$data['user_tel'])){
            // echo"手机格式13 14 15 17 18 19开头11位";exit;
            errorly('邮箱格式不正确');
          }else{
            $umodel = model('Users');
            $where=[
              ['user_tel','=',$data['user_tel']]
            ];
            
            $count =$umodel->where($where)->count();
            //  dump($count);exit;

            if($count>0){
              // echo"此手机已经被注册";exit;
              errorly("此邮箱已经被注册");
            }
        }

        //②验证 验证码非空、当前输入验证码是否与session中验证码一致、当前时间-session中发送时间>300秒
        if(empty($data['user_code'])){
          // echo"验证码必填";exit;
          errorly("验证码必填");
        }
        if($data['user_code']!=$userInfo['user_code']){
          // echo"验证码 错误";exit;
          errorly('验证码错误');
        }
        if(time()-$userInfo['send_time']>300){
          // echo"验证码超时失效";exit;
          errorly('验证码超时5分钟失效');
        }
        // 验证当前邮箱与发送验证码的邮箱是否一致
        if($data['user_tel']!=$userInfo['user_tel']){
          // echo"当前电话与你发送验证码电话不一致";exit;
          errorly('当前电话与你发送验证码电话不一致');
        } 

        //密码验证
        if(empty($data['user_pwd'])){
          // echo"密码不能为空";exit;
          errorly('密码不能为空');
        }else if(strlen($data['user_pwd'])<6||strlen($data['user_pwd'])>15){
          // echo"密码要6-12位之间";exit;
          errorly('密码要6-12位之间');
        }
        if($data['user_pwd1']!=$data['user_pwd']){
          // echo"两次输入的密码不一致，检查一下";exit;
          errorly('两次输入的密码不一致，检查一下');
        }


      }
      //入库
      $umodel = model('Users');
      $data['user_pwd'] = md5($data['user_pwd']);
      $res = $umodel->save($data);
        if($res){
          successly('注册成功，请登录购物');
        }else{
          errorly('注册失败');
        }

      

    
      
      
   }

  /**点击获取短信的生成 
   * ④接受账号的值
   * ⑤验证账号是否为空、格式、唯一性 (注意:js验证关闭掉)
		⑥随机获取6位数作为验证码
		⑦给当前账号发送验证码
		⑧把账号、验证码、发送时间存储到session中*/
  
 public function sendTelCode(){
    $user_tel = input('post.user_tel');
    // dump($user_tel);
    if($user_tel==""){
      // echo"手机账号不能为空";exit;
      errorly('手机账号不能为空');
    }
    $reg = '/^1[34578]\d{9}$/';
    if(!preg_match($reg,$user_tel)){
      // echo"手机格式不正确";exit;
      errorly('手机格式不正确');
    }else{
      $umodel = model('Users');//唯一性
      $where = [
        ['user_tel','=',$user_tel]
      ];
      $count = $umodel->where($where)->count();
      // dump($count);
      if($count>0){
        // echo"此手机号被注册，请更换";exit;
        errorly('此手机号被注册，请更换');
      }
    }
    //随机获取验证码
    $code = createCode();
    //  dump($code);exit;
    // 给当前的手机发送验证码
  
        //  dump($user_tel);exit;
    $res = sendSms($user_tel,$code);
      //  dump($res);exit;
    if($res){
      //8.把邮箱、验证码、发送时间存储到session中
      session('userInfo',['user_tel'=>$user_tel,'user_code'=>$code,'send_time'=>time()]);
      // echo"发送成功";exit;
      successly('发送成功');
    }else{
      // echo"发送失败";exit;
     errorly('发送失败');
    }
  }
/**登录页面  页面 login.html
 * 4、接受ajax传过来的值  账号  密码   记住10天
  5、根据账号进行查询(查到一条数据，一维数组$data)
 */
  public function logindo(){
    $data = input('post.'); 
    // dump($data);exit;
    $account = input('post.account');
    $umodel = model('Users');
    
    // echo substr_count($account,"@");
    // 验证客户是手机登陆还是邮箱登陆
    if(substr_count($account,"@")>=1){
      $where = [
      ['user_email','=',$data['account']], 
      ];
    }else{
      $where = [
        ['user_tel','=',$data['account']],
      ];
    }
    
    // dump($where);exit;
    $info = $umodel->where($where)->find();
     // dump($info);exit;
  
  
    
    if($account==""){
      errorly("账号不能为空");
      // echo"账号密码不能为空";die;
    }
    if(!$data){
      errorly("账号密码错误");
      // echo"账号密码错误";exit;
    }
    if(empty($info)){
      errorly("账号不存在");
      // echo"账号密码错误";exit;
    }
    
    if($info['user_pwd']!=md5($data['user_pwd'])){
      $error_num = $info['error_num'];//获取数据库里面 的错误次数
      $last_error_time = $info['last_error_time'];//获取每一次错误时间
      $where = [
          ['user_id','=',$info['user_id']]
      ];//获取登陆的id
        if(time()-$last_error_time>180){
          $res = $umodel->where($where)->update(['error_num'=>1,'last_error_time'=>time()]);
          errorly("账号密码有误，您还有2次机会");
          // echo"账号密码有误，您还有2次机会";
        }else{
              if($error_num>=3){
                // 要告诉用户还要多长时间登录，就是倒计时2
              $mins = 3-ceil((time()-$last_error_time)/60);
              errorly("账号已经锁定，请".$mins."分钟后登陆");
                // echo"账号已经锁定，请".$mins."分钟后登陆";exit;
              }
              // 1.
            $res = $umodel->where($where)->update(['error_num'=>$error_num+1,'last_error_time'=>time()]);
            $last_num=3-($error_num+1);
            if($res){
              errorly('账号密码有误，您还有'.$last_num.'次机会');
              // echo'账号密码有误，您还有'.$last_num.'次机会';
            }

        }
        
    }

    if($info['user_pwd']==md5($data['user_pwd'])){
      // 密码正确判断，密码错误三次以上，并且错误时间在三分钟之内 那么不能登录 
      $error_num = $info['error_num'];//获取数据库里面 的错误次数
      $last_error_time = $info['last_error_time'];//获取每一次错误时间
        if($error_num>=3&&time()-$last_error_time<180){
          $mins = 3-ceil((time()-$last_error_time)/60);
          errorly("账号已经锁定，请".$mins."分钟后登陆");
          // echo"账号已经锁定，请".$mins."分钟后登陆";exit;
        }
        // 当登陆成功后，登陆错误次数和时间清零
        $res = $umodel->where($where)->update(['error_num'=>0,'last_error_time'=>null]);
        // 登录成功后记录session存储id和session账号  账号记录数据库的id 账号因为不好获取数据库的到底是email
        // 还是tel，就直接获取￥data里面的account
        session('userData',['user_id'=>$info['user_id'],'account'=>$data['account']]);

        // 做 记住账号密码7天
        if(!empty($data['remember_me'])){
          cookie('ainfo',['account'=>$data['account'],'user_pwd'=>$data['user_pwd']],60*60*24*7);
        }
        $this->asyncHistory();
        $this->asyncCart();
        successly("登陆成功");
    }

  }

  /**退出，清除session 记住账号密码的的cookie的所有信息 */
  public function quit()
  {
    session('userData',null);
    cookie('ainfo',null);
    $this->success('退出...',url('Login/login'));
  }

  //忘记密码找回密码
  public function password()
  {
      return view();
  }
  //密码找回邮箱发送
  public function passwordo()
  {
      $user_email=input('post.user_email');
          // 验证邮箱是否为空、格式、唯一性 (注意:js验证关闭掉)
    $reg = '/^[a-z]\w{6,18}@\d{3,5}(\.)|com|cn|net$/';
    if(empty($user_email)){
      // echo"邮箱不能为空";exit测试的时候用echo  用完后换成json
      errorly('邮箱不能为空');
    }
    if(!preg_match($reg,$user_email)){
     
      errorly('邮箱格式不正确');
    }else{
        $umodel = model('Users');
        $where=[
          ['user_email','=',$user_email]
        ];
         
        $counta =$umodel->where($where)->count();
        //  dump($count);exit;

        if($counta<0){
          errorly("此邮箱不对");
        }
    }
    // dump($count);exit;
     $count =$umodel->where($where)->find();

    $string =md5($count['user_id'].'-'.$count['user_email'].'-'.$count['user_pwd']);
    $str=base64_encode($count['user_id'].'-'.$string);

    $url="http://www.shop.cn/Login/retrievepwd?p=".$str;
    // $url="http://www.lzhb.cn/index/login/activation?token=".$data['token'];

    //随机生成6个数字
    // $code = createCode();
    // var_dump($code);exit;
    // 给当前的邮箱发送验证码
    $body="验证完成，请点击<a href='{$url}'>{$url}</a>进行修改密码";
      // dump($body);exit;
    $res = sendEmail($user_email,"已确认",$body);
    // dump($res);exit;
    if($res){
      //8.把邮箱、验证码、发送时间存储到session中
      successly('发送成功');
    }else{
      errorly('发送失败');
    }

  }
  public function retrievepwd()
  {
      $p=input('get.p');
      $str=base64_decode($p);
      $string=explode('-', $str);
      $user_id=$string['0'];
      $user_model=model("Users");
      $res=$user_model->where(['user_id'=>$user_id])->find();
      $res =md5($res['user_id'].'-'.$res['user_email'].'-'.$res['user_pwd']);
      // dump($res);
      // dump($str);exit;
      if($res==$string['1']){
        $this->assign('user_id',$user_id);
        return view();
      }else{
        //邮箱错误
        echo 213;
      }

      
  }
  public function getnewpwd()
  {
      $user_id=input('post.user_id');
      $passworda=input('post.passworda');
      $passwordb=input('post.passwordb');
      // if(!$passworda==$passwordb){
      //   echo 23;
      //   $this->error('密码不一样');
      // }

      
  }


}






