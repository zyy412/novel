<?php
/**
 * 用于注册
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Register as Reg;//重命名

class Register extends Controller
{
	public function index()//index方法，渲染到register视图
	{
		return $this->fetch('register');
	}

	public function doRegister()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$captcha = $_POST['captcha'];
		if(captcha_check($captcha))  
		{
			if(!empty($username))
			{
				$register = new Reg;
				$status = $register->RegisterModel($username,$password);
				if($status == 1)
				{
					$this->error('用户名已存在！');
				}
				else
				{
					$this->success('注册成功,请登录！','Index/index');
				}
			}
		}
		else
		{
			$this->error('验证码错误！');
		}
	}
}