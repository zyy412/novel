<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Password as Pass;

class Password extends Controller
{
    public function index()
    {
        return $this->fetch('password');
    }
    public function doPassword()
    { 
        $username = $_POST['username'];
        $newpassword = $_POST['newpassword'];
        $newpassword1 = $_POST['newpassword1'];
        if($newpassword = $newpassword1)  
        {
            $password = new Pass;
            $status = $password->PasswordModel($username,$newpassword,$newpassword1);
            if($status == 1)
            {
                $this->success('修改成功，请重新登录！','Index/index');
            }else{
                $this->error('检查用户名是否存在！');
            }
        }
    }
}