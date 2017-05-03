<?php
namespace Admin\Controller;
use Think\Controller;

class StatusController extends Controller
{
    public function add() {
        if(IS_POST){
            $mod = M('Status');
            $mod->s_name = $_POST['s_name'];
            if($mod->add()){
                $this->success('添加成功！');
                die;
            }else{
                $this->error('添加失败');
                die;
            }
        }
        $this->display();
    }
    
    
    public function lst() {
        $mod = M('Status');
        $info = $mod->select();
        $this->assign('info',$info);
        $this->display();
    }
    
    
    public function edit() {
        $mod = M('Status');
        if(IS_POST){
            $mod->s_name = $_POST['s_name'];
            if($mod->where("id={$_POST['id']}")->save()){
                $this->success('修改成功！',U('Status/lst'));
                die;
            } else {
                 $this->error('修改失败');
                 die;
            }
        }
        
        $info = $mod->where("id={$_GET['id']}")->find();
        $this->assign('data',$info);
        $this->display();
    }
    
    public function delete() {
        $mod = M('Status');
        if($mod->delete($_GET['id'])){
            $this->success('删除成功！');
        } else {
            $this->error('删除失败');
        }
    }
    
}
