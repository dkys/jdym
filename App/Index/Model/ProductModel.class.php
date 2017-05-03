<?php

namespace Index\Model;
use Think\Model;
//
class ProductModel extends Model
{
    public function proInfo1() 
    {
        return $this->alias('a')->order('sort asc')->select();
    }
    
    public function proInfo($id) 
    {
        return $this->alias('a')
                ->field('a.*')
                ->join("jd_fenlei b on a.fenlei_id=b.id")
                ->where("b.id=$id")
                ->order('a.sort asc')
                ->select();
    }
    
      public function newsInfo($cateid,$ofset=0,$lenth=3)
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
