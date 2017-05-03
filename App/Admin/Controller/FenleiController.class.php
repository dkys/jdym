<?php
namespace Admin\Controller;
use Think\Controller;
class FenleiController extends BaseController
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('Fenlei');
//                    dump($_POST);die;
//			dump($model->create(I('post.'), 1));die;
    		if($model->create(I('post.'), 1))
    		{
                    $model->pid = $_POST['pid'];
    			if($model->add())
    			{
    				$this->success('添加成功！', U('lst?p='.I('get.p')));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '添加分类',
			'_page_btn_name' => '分类列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Fenlei');
    		if($model->create(I('post.'), 2))
    		{
    			if($model->save() !== FALSE)
    			{
    				$this->success('修改成功！', U('lst', array('p' => I('get.p', 1))));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
    	$model = M('Fenlei');
    	$data = $model->find($id);
    	$this->assign('data', $data);

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '修改分类',
			'_page_btn_name' => '分类列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Fenlei');
    	if($model->delete(I('get.id', 0)) !== FALSE)
    	{
    		$this->success('删除成功！', U('lst', array('p' => I('get.p', 1))));
    		exit;
    	}
    	else 
    	{
    		$this->error($model->getError());
    	}
    }
    public function lst()
    {
    	$model = D('Fenlei');
    	$data = $model->search();
//        dump($data);die;
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '分类列表',
			'_page_btn_name' => '添加分类',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}