<?php
namespace app\index\controller;
use think\Controller;
use PHPMailer\SendMail;
class Repassword extends Controller
{
	/**
	 * 试图渲染
	 */
	public function index()
	{
		return $this->fetch('repassword_mail');
	}
	
 //    public function index1()
	// {
	// 	return $this->fetch('repassword');
	// }
     //发送邮件
	public function sendmail()
	{
		$code = rand('100000','999999');//生成六位随机数
		$time = date("Y-m-d H:i:s");
		$t = time()+600;//时间戳，判断过期
		$year = date("Y");
		$email = $_POST['email'];
	    $title = "张永妍小宝贝";//邮件标题
		$message = $code;//邮件内容
		$address = $email;//收件人
		$result = SendMail::SendMail($title,$message,$address);
		\think\Session::set('t',$t);
		\think\Session::set('code',$code);
        if($result){
			//发送成功的处理逻辑
			echo "success";
        }else{
			//发送失败的处理逻辑
			echo "error";
        }
	}
	//验证码验证
	public function doRepassword()
	{
		$num = $_POST['captcha'];
		$t1 = time();
		var_dump($t1);
		$code = \think\Session::get('code');
		$t = \think\session::get('t');
		var_dump($t);
		var_dump($num);
		var_dump($code);
		if($num == $code)
		{
			if($t1>$t)
			{
              $this->error('验证码超时，请重试!', 'Repassword/index');
			}else{
			$this->success('验证成功！');
		      }
		}else{
			$this->error('验证失败，请重试！','Repassword/index');
		}
	}
}