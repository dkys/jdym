<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 9:07
 */
namespace Index\Controller;

class ImmigrantController extends BaseController
{

    public function immigrant(){
        layout(true);
        $mod = D('Fenlei');
        $info = $mod->xmList(2,0,3);
        $this->assign('list',$info);
        $this->display();
    }
    
    public function ajaxImm() {
         if(IS_AJAX){
        $mod = D('Fenlei');
        $data = $mod->xmList(2,$_POST['first'],3);
        $this->ajaxReturn($data);
        }
    }
    
}