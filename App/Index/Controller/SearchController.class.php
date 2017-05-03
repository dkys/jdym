<?php
namespace Index\Controller;
use Think\Controller;

class SearchController extends Controller
{
    public function search() 
    {
        layout(TRUE);
        if(IS_POST){
            $mod = M('Client');
            $info = $mod->where("mobile='{$_POST['keywords']}'")->find();
        }
//        dump($info);die;
        $this->assign('info',$info);
        $this->display();
    }
}
