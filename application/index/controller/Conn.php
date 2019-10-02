<?php
namespace app\index\controller;
use think\Db;

class Conn
{
	 public function index()
    {
    	$DB = Db::connect([
    		// 数据库类型
		    'type'            => 'mysql',
		    // 服务器地址
		    'hostname'        => '127.0.0.1',
		    // 数据库名
		    'database'        => 'diancan',
		    // 用户名
		    'username'        => 'root',
		    // 密码
		    'password'        => '',
		    // 端口
		    'hostport'        => '3306',
    	]);
 
    	// dump($DB);
    	// 查询数据，，，，和使用系统的DB类方法略有差异
    	$data = $DB -> table("user") -> where('id',4) -> select();
    	dump($data);
    }
}