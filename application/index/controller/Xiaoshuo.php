<?php
namespace app\index\controller;
use think\Controller;
use QL\QueryList;
 
class Xiaoshuo extends Controller
{
    public function index($num = 0)
    {
        //采集目标
        $url='https://www.readnovel.com/chapter/14156142405054404/38036428006825553?offset=';
        //采集规则
        $rules = array(
                    'title'=>array('.j_chapterName','text'),
                    'novel'=>array('.j_readContent','text'),
                );
        //开始采集
        $data = QueryList::Query($url,$rules)->data;
        print_r($data);
    }
}