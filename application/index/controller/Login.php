<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Admin;//添加控制器

class Login extends Controller
{
	public function index()
    {
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$captcha = $_POST['captcha'];
    	 if(captcha_check($captcha))
    	 {
    	 	if(!empty($username))
    	 	{
    	 		$login = new Admin;
    	 		$status = $login->LoginModel($username,$password);
    	 		if($status == 1)//获取参数
    	        {
    		      $this->success('登录成功！','Hello/index');
    	        }
    	        elseif($status==2)
    	        {
                    return $this->error('账号或者密码错误!');
                }else
                 {
                    return $this->error('用户不存在!');
                 } 
            }else{
                $this->error('输入格式有误！请重新输入');
            }
        }else
          {
            $this->error('验证码不正确！');
          }
    }
}
