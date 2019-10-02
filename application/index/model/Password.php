<?php
namespace app\index\model;
use think\Model;

class Password extends Model
{
    public function PasswordModel($username,$newpassword)
    {
        $data= \think\Db::name('user')->where("username='$username'")->find();
    	if($data)
        {
            $data1 = \think\Db::name('user')->where("username='$username'")->update(['password'=>$newpassword]);  
            return 1;
        }
        else
        {
            return 2;
        }
    }
}


