<?php

namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController
{
	public function pass()
    {
        if(IS_POST)
        {
            $model = D('Admin');
            $data['mpass'] = $_POST['mpass'];
            $data['newpass'] = $_POST['newpass'];
            if($model->gaimi($data))
            {
                echo "<script>window.top.location.href=\"U('index/index')\";</script>";
                exit;
            }else
            {
                $this->error($model->getError());
            }
        }
        $this->display();
    }
}