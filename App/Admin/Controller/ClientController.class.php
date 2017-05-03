<?php
namespace Admin\Controller;
use Think\Controller;

class ClientController extends Controller
{
    public function lst() 
   {
        $mod = M('Client');
        $info = $mod->select();
        $this->assign('list',$info);
        $this->display();
    }
    
    
    public function add() 
   {
        if(IS_POST){
//            dump($_POST);die;
            $mod = M('Client');
//            $mod->s_name = $_POST['s_name'];
            if($mod->create()){
                
                if($mod->add()){
                $this->success('添加成功！',U('Client/lst'));
                die;
            }else{
                $this->error('添加失败');
                die;
            }
            
            }
            
        }
        $this->display();
    }
    
    
    public function edit() 
   {
        $mod = M('Client');
        if(IS_POST){
            if($mod->create()){
                
                if($mod->save()){
                    $this->success('修改成功！',U('Client/lst'));
                    die;
                } else {
                    $this->error('修改失败');
                    die;
                }
            }
        }
        $info = $mod->where("id={$_GET['id']}")->find();
        $this->assign('data',$info);
        $this->display();
    }
    
    public function delete() 
    {
        $mod = M('Client');
        if($mod->delete($_GET['id'])){
            $this->success('删除成功！');
            die;
        } else {
            $this->error('删除失败');
            die;
        }
    }
    
}
