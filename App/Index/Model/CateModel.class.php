<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 18:40
 */

namespace Index\Model;
use Think\Model;

class CateModel extends Model
{
    //获取签证下的分类
    public function cateInfo(){

        $pid = $this->field('id')->where("cate_name='签证' and pid=0")->order('sort asc')->find();
        return $this->where("pid={$pid['id']}")->order('sort asc')->select();

    }
}