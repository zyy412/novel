<?php
namespace app\index\controller;
use think\Controller;
use QL\QueryList;
 
class Ceshi extends Controller
{
    public function index($num = 0)
    {
        //采集目标
        $url='https://maoyan.com/board/4?offset='.$num*10;
        //采集规则
        $rules = array(
                    'src'=>array('.board-img','data-src'),
                    'board'=>array('.board-index','text'),
                    'name'=>array('.name','text'),
                    'star'=>array('.star','text'),
                    'releasetime'=>array('.releasetime','text'),
                    'score'=>array('.score','text')
                );
        //开始采集
        $data = QueryList::Query($url,$rules)->data;
        dump($data);
        echo "<br><br>";
        //采集10条数据
        if($num<10){
            $num++;
            $this->index($num);
        }
    }
}
