<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 9:20
 */

namespace Index\Controller;


class ContactController extends BaseController
{

    public function contact()
    {
        layout(true);
        $this->display();
    }
}