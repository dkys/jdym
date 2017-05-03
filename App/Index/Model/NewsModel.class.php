<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 16:24
 */

namespace Index\Model;
use Think\Model;
use Think\Page;

class NewsModel extends Model
{
    public function newsInfo($cateid,$ofset=0,$lenth=8)
    {
//        $count = $this->count();
//        $page = new \Think\Page($count,2);
//        $show = $page->show();
//        $list = $this->where("cate_id=$cateid")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        return $this->where("cate_id=$cateid")->order('id desc')->limit($ofset,$lenth)->select();
//        $data['show'] = $show;
//        $date['list'] = $list;

    }

    public function newsInfo2($lenth=5)
    {
         return $this->order('id desc')->limit($lenth)->select();

    }

    //无限分类
    public function wxFl($data,$pid=0)
    {
        $tree = array();
        if($data){
            foreach($data as $k=>$v){
                if($v['pid'] == $pid){
                    $tree[] = $v;
                    $temp = $this->wxFl($data, $v['id']);
                    $tree = array_merge($tree,$temp);
                }
            }
        }
        return $tree;

    }
}