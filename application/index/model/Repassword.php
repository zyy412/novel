<?php
namespace app\index\model;

use think\Model;

class Repassword extends Model
{
    public function RepasswordModel($password,$newpassword)
    {
        
        if($password = $newpassword)
        {
            
                            \think\Session::set('id',$data['id']);
                \think\Session::set('username',$data['username']);
                //echo session('id');die;
                //$db=\think\Db::table("system_student")->where('s_num',$data['s_num'])->update(['last_login_time'=>date('Y-m-d H:i:s',time())]);
                