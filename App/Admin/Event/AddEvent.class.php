<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/12/6 16:53
 */

namespace Admin\Event;

use Think\Controller;

class AddEvent extends Controller
{
    public function general($table)
    {
        if(IS_POST&&!empty($_POST))
        {
            if(M($table)->add($_POST))

                $this->success("添加成功!");
            else
                $this->error("添加失败!");

        }
    }
}