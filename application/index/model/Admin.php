<?php
namespace app\index\model;

use think\Model;

class Admin extends Model
{
    public function LoginModel($username,$newpassword,$newpassword1)
    {
        $data= \think\Db::name('user')->where("username='$username'")->find();
        
    	if($data)
        {
    		if($newpassword = $newpassword1)//对password进行md5加密
            {
    			\think\Session::set('id',$data['id']);
				\think\Session::set('username',$data['username']);
				//echo session('id');die;
				//$db=\think\Db::table("system_student")->where('s_num',$data['s_num'])->update(['last_login_time'=>date('Y-m-d H:i:s',time())]);
    			return 1;
    		}
            else
              {
    			return 2;
    		  }
        }
      else
        {
        return 3;
        }
    }
}

