<?php
namespace Admin\Controller;
use Think\Controller;
class AdvController extends BaseController {
    public function adv(){
        $model=D('Adv');
        if(IS_POST)
        {
//            dump($_POST);die;
            if($model->create())
            {
//                $cate_name = $_POST['cate_name']
                switch ($_POST['cate_name']){
                case '首页':
                    $model->url = U('Index/Index/index');
                    break;
                case '关于我们':
                    $model->url = U('Index/About/about');
                    break;
                case '移民':
                    $model->url = U('Index/Immigrant/immigrant');
                    break;
                case '签证':
                    $model->url = U('Index/Visa/visa');
                    break;
                case '案例':
                    $model->url = U('Index/Case/cases');
                    break;
                case '联系我们':
                    $model->url = U('Index/Contact/contact');
                    break;
                }
                
                if($model->add())
                {
                    $this->success('添加成功');
                    exit;
                }
            }
            $this->error($model->getError());
        }
        $cateModel = D("Cate");
        $cateInfo = $cateModel->where('pid=0')->select();
        //获取轮播图信息
        $info = $model->select();
//        dump($info);
        $this->assign('cateInfo',$cateInfo);
        $this->assign('info',$info);
        $this->display();
    }

    public function ajaxDelAdvData(){
        $model=D('Admin/Adv');
        $model->delete(I('get.imgId'));

    }
}