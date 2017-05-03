<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 9:11
 */

namespace Index\Controller;

class VisaController extends BaseController
{

    public function visa()
    {
        layout(true);
        $mod = D('Fenlei');
        $info = $mod->xmList(1);
//        dump($info);
        $this->assign('list',$info);
        $this->display();
    }

    //签证详情
     public function visaDetail()
    {
        layout(true);
        $proid = $_GET['proid'];
        $mod = D('Product');
        $proinfo = $mod->proInfo($proid);
//        dump($proinfo);
        $this->assign('proinfo',$proinfo);
        $this->display();
    }
    
    public function ajaxPro()
    {
        if(IS_AJAX){
        $mod = D('Fenlei');
        
        $data = $mod->xmList(1,$_POST['first'],3);
        $this->ajaxReturn($data);
        }
    }

}