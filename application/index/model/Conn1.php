<?php
namespace app\index\model;

use think\Model;
use think\db;

class Conn2 extends Model
{
   public function query()
   {
   	$data = db::table('user') -> select();
   	return $data;
   }
}
