<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends BaseController
{
    public function add()
    {
        if(IS_POST)
        {
            if(empty($_FILES['logo']['name'])){
                $this->error("封面图片不能为空！");
                die;
            }
            $model = D('News');
//        dump($_POST);die;
            if($model->create(I('post.'),1))
            {
//                dump($model->create(I('post.'), 1));die;
                if($id = $model->add())
                {
                    $this->success('添加成功！', U('lst?p='.I('get.p')));
                    exit;
                }
            }
            $this->error($model->getError());
        }

        //获取全部分类
        $cateModel = D("Cate");
        $cateInfo = $cateModel -> select();
//        dump($cateInfo);die;
        $this->assign('cateInfo',$cateInfo);

        // 设置页面中的信息
        $this->assign(array(
            '_page_title' => '添加',
            '_page_btn_name' => '列表',
            '_page_btn_link' => U('lst'),
        ));
        $this->display();
    }
    public function edit()
    {
        $id = I('get.id');
//        dump($id);die;
        if(IS_POST)
        {
//            dump($_POST);die;
            $model = D('News');
            if($model->create(I('post.'), 2))
            {
                $model->entitle = $_POST['entitle'];
                if($model->save() !== FALSE)
                {
                    $this->success('修改成功！', U('lst', array('p' => I('get.p', 1))));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        $model = M('News');
        $data = $model->find($id);
        $this->assign('data', $data);
        // dump($data);

        //获取全部分类
        $cateModel = D("Cate");
        $cateInfo = $cateModel->where('pid<>0')->select();
        $this->assign('cateInfo',$cateInfo);
        // 设置页面中的信息
        $this->assign(array(
            '_page_title' => '修改商品展示',
            '_page_btn_name' => '商品展示列表',
            '_page_btn_link' => U('lst'),
        ));
        $this->display();
    }
    public function delete()
    {
        $id = I("get.id");
//        dump($id);die;
        $model = D('News');
        //删除新闻
        if(false!== $model->delete($id))
        {
            $this->success('删除成功');
        }else
        {
            $this->error('删除失败');
        }
    }
    public function lst()
    {
        $model = D('News');
        $data = $model->search();
//		dump($data);die;
        $this->assign(array(
            'data' => $data['data'],
            'page' => $data['page'],
        ));

        // 设置页面中的信息
        $this->assign(array(
            '_page_title' => '商品展示列表',
            '_page_btn_name' => '添加商品展示',
            '_page_btn_link' => U('add'),
        ));
        $this->display();
    }
}