<?php
namespace app\index\model;
use think\Model;

class Register extends Model
{
     public function RegisterModel($username,$password)
    {
        
        $data = \think\Db::name('user')->where("username='$username'")->find();
        if($data)
        {
            return 1;
        }
        else
        {
            $values =  ['username'=>$username,'password'=>$password];
            $data1 = \think\Db::name('user')->insert($values);  
        }
    }
}