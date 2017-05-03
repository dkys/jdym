<?php

namespace Index\Model;
use Think\Model;

class FenleiModel extends Model
{
    //签证项目列表
    public function xmList($pid,$ofset=0,$lenth=3) 
    {
        return $this->where("pid={$pid}")->order('id desc')->limit($ofset,$lenth)->select();
    }
    
    public function xmList1($ofset=0,$lenth=1)
    {
//        $count = $this->count();
//        $page = new \Think\Page($count,2);
//        $show = $page->show();
//        $list = $this->where("cate_id=$cateid")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        return $this->order('id desc')->limit($ofset,$lenth)->select();
//        $data['show'] = $show;
//        $date['list'] = $list;

    }
    
}
