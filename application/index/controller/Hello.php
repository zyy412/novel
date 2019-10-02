<?php
namespace app\index\controller;//命名空间
use think\Controller;

class Hello extends Controller
{
    public function index()//index操作方法
    {   
        return $this ->fetch('index/hello');//模板文件的调用
    }
}
