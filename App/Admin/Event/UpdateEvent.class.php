<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/12/6 16:54
 */

namespace Admin\Event;


use Think\Controller;

class UpdateEvent extends Controller
{
     public function general($table)
     {
         if(IS_POST&&!empty($_POST))
         {
             if(M($table)->save($_POST))

                 $this->success("操作成功");
             else
                 $this->error("操作失败");

         }
     }


}