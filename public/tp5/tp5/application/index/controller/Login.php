<?php

namespace app\index\controller;
use email\phpmailer;
use think\Controller;
use think\Request;
use  think\facade\Session;
use app\index\model\Histroy;
use app\index\model\Login as lmodel;
use app\index\model\Goods;
use app\index\model\Car;
class Login extends Controller
{
    //登陆
    public function login()
    {
        $refer=input('refer','');
        $this->view->engine->layout(false);
        $this->assign('refer',$refer);
        return $this->fetch();
    }
    public function login_do()
    {
        $this->view->engine->layout(false);
        //接收值
        $username=input("post.username");
        $pwd=input("post.pwd");
        $refer=input("post.refer");

        //查询数据库中有无
        $into=\Db::name('index_user')->where('username',$username)->find();

        //判断和上次登陆的IP地址一样不一样
        $id=$into['id'];
        $log=\Db::name('index_login')->where('user_id',$id)->order('login_time','desc')->find();
        //获取IP
        $log_ip=$_SERVER['REMOTE_ADDR'];
        if($log['login_ip']!=$log_ip){
            // $this->success('124');
            $sjr=$into['email'];
            $title='异地登陆提示';
            $content="你的账号在异地登陆";
            $result=sendEmail($sjr,$title,$content);  //调用common.php的方法发送邮件
        }
        
        //用户名对不对
        if(!$into){
            $this->error("用户名不对");die;
        }
        // 密码对不对   密码啊输入三次锁住一段时间
        if($into['pwd']!=$pwd){
            //如果输入次数等于三
            if($into['error_num']==3){
                if($into['error_time'] > time()){
                    //如果冻结时间大于现在时间，冻结
                    $this->error('密码被冻'.date("Y-m-d H:i:s",$into['error_time']));
                }else{
                    //如果现在时间大于冻结时间，解冻
                    lmodel::where(['id'=>$into['id']])->update(['error_num'=>0,'error_time'=>0]);
                }
            }
            //已经输入二次，最后一次也不正确
            if($into['error_num']==2){
                //冻结时间等于现在时间戳加上冻结多长时间
                $time=time()+180;
                // inc 加一
                lmodel::where(['id'=>$into['id']])->inc('error_num')->update(['error_time'=>$time]);
                $this->error("密码不对!!!   最后一次机会都没了");
            }else{
                lmodel::where(['id'=>$into['id']])->inc('error_num')->update();
                $this->error("密码不对");
            }
        }
        //如果冻结时间戳大于当前时间戳 ，冻结中
        if($into['error_time'] > time()){
                    $this->error('密码被冻'.date("Y-m-d H:i:s",$into['error_time']));
        }
        //登陆日志的添加
        $login=[];
        $login['login_time']=time();
        //获取当前的IP
        $login['login_ip']=$_SERVER['REMOTE_ADDR'];
        $login['user_id']=$into['id'];
        $in=\Db::name('index_login')->insert($login);

        Session::set('indexsession',$into);
        //浏览记录  登陆之后
        $this->asyncHistory();
        //购物车同步
        $this->asyncCar();

        if($refer){
            $this->redirect($refer);
        }else{
            $this->success("登陆成功","index/index");
        }
        
    }
    //加入购物车同步
    //cookie取值
    //无 return
    //有  循环
    //  根据where条件  goods_id  user_id 查询有无历史记录
    //   有 更新买数量 根据goods_id 查询库存跟购买数量对比 如果购买数量大于库存 则改为库存
    //   无  添加
    public function asyncCar()
    {
        $history=json_decode(cookie('car'),true)?:[];
        if(!count($history)){
            return;
        }

        foreach($history as $k=>$v){
            $where=[
                'user_id'=>session('indexsession')['id'],
                'goods_id'=>$v['goods_id']
            ];
            // dump($where);xss
            // 查询
            $data=Car::where($where)->find();
            $goods=Goods::where(['goods_id'=>$v['goods_id']])->find();
            // dump($data);
            if($data){
                $data['by_number'] += $v['by_number'];
                Car::where($where)->update(['by_number'=>$data['by_number']]);
            }else{
                $array=[
                    'user_id'=>session('indexsession')['id'],
                    'goods_id'=>$v['goods_id'],
                    'by_number'=>$v['by_number'],
                    'shop_price'=>$goods['shop_price'],
                    'goods_name'=>$goods['goods_name'],
                    'goods_img'=>$goods['goods_img'],
                    'add_time'=>time(),
                ];
                // dump($array);
                Car::create($array);
            }
            cookie('car',null);
        }
    }
    //浏览记录同步
    public function asyncHistory()
    {
        //查询cookie是否有记录
        $history=json_decode(cookie('history'),true)?:[];
        // dump($history);
        // 如果有没有记录
        if(!count($history)){
            return;
        }else{
            foreach ($history as $k => $v) {
                $where=['goods_id'=>$v['goods_id'],'user_id'=>session('indexsession')['id']];
                $data=Histroy::where($where)->find();
                // dump($data);
                if($data){
                    if($v['add_time']>$data['add_time']){
                        Histroy::where($where)->update(['add_time'=>$v['add_time']]);
                    }
                }else{
                    $data=array_merge($where,['add_time'=>$v['add_time']]);
                    Histroy::create($data);
                    // \Db::name('Histroy')->insert($data);
                }
            }
        }
    }

    //注册
    public function register()
    {
        $this->view->engine->layout(false);
        return $this->fetch();
    }
    //注册成功
    public function reginter_do()
    {
        $this->view->engine->layout(false);
        $data=input('post.');
        $email=$data['email'];
        // 邮箱验证的时间
        $data['token_time']=time()+60;
        //验证 传输值的加密
        $username=$data['username'];
        $pwd=$data['pwd'];
        $time=time();
        $data['token']=md5($username.$pwd.$time);
         //数据添加
        $into=\Db::name('index_user')->insert($data);
        // if($into){
        //     $this->success("添加成功");
        // }
        // 获取添加数据的ID   获取自增id
        // $id = \Db::name('index_user')->getLastInsID();
        //邮箱发送
        $sjr=$data['email'];
         $title='验证登陆';
         $url="http://www.lzhb.cn/index/login/activation?token=".$data['token'];
         $content="注册完成，请点击<a href='{$url}'>{$url}</a>进行激活";
         $result=sendEmail($sjr,$title,$content);  //调用common.php的方法发送邮件
         Session::set('index',$data,'60');
         if($result){
            $this->success("注册成功","login/login");
         }else{
            $this->success("失败");
         }
    }
    //邮箱验证码激活
    public function activation()
    {

        $token=input('get.token');
        $info=lmodel::where(['token'=>$token])->find();
        if($info['token_time']< time()){
            $this->error('激活已过期');
        }
        lmodel::where(['token'=>$token])->update(['center'=>1]);
    }
    public function tui()
    {
        Session::delete('indexsession');
        $this->success('退出登陆成功','index/index');
        // return view("index/index");
    }
    
}
