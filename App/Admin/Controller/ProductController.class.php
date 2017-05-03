<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends BaseController
{
    public function add()
    {
        if(IS_POST)
        {
//            dump($_POST);die;
            $model = D('Product');
       
            if($model->create(I('post.'), 1))
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
        $fenleiModel = D("Fenlei");
        $fenleiInfo = $fenleiModel -> select();
//        dump($fenleiInfo);die;
        $this->assign('fenleiInfo',$fenleiInfo);

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
            $model = D('Product');
            if($model->create(I('post.'), 2))
            {
                $model->sort = $_POST['sort'];
                if($model->save() !== FALSE)
                {
                    $this->success('修改成功！', U('lst', array('p' => I('get.p', 1))));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        $model = M('Product');
        $data = $model->find($id);
        $this->assign('data', $data);
//         dump($data);die;

        //获取全部分类
        $fenleiModel = D("Fenlei");
        $fenleiInfo = $fenleiModel -> select();
        $this->assign('fenleiInfo',$fenleiInfo);
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
        $model = D('Product');
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
        $model = D('Product');
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