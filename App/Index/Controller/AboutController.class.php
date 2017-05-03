<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/21
 * Time: 18:54
 */

namespace Index\Controller;


class AboutController extends BaseController
{
    public function about()
    {
        layout(true);
        $this->display();
    }
}