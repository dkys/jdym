<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends BaseController
{
    public function add()
    {
    	$model = D('Cate');
    	if(IS_POST)
    	{
//		dump($_POST);die;
			//最多添加5个分类
			$con = $model->where('pid<>0')->count();
//			echo $con; die;
			if($con >= 5){
				$this->error('最多只能添加5个分类！');
				exit;
			}
    		if($model->create(I('post.'), 1))
    		{
                    $model->pname = $_POST['pname'];
                    $model->pid = $_POST['pid'];
    			if($id = $model->add())
    			{
//                            $rest = $model->field('url')->where("id={$_POST['pid']}")->find();
//                            $url = $rest['url'].'/cateid/'.$id;
//                            $model->url = $url;
//                            if($model->where("id={$id}")->save()){
                                
                                $this->success('添加成功！', U('lst?p='.I('get.p')));
    							exit;
//                            }
    			}
    		}
    		$this->error($model->getError());
    	}

		$info = $model->where("pid=0")->select();
//		dump($info);die;
		$this->assign('cateinfo',$info);
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
    		$model = D('Cate');
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
    	$model = M('Cate');

		$cate = $model->where('pid=0')->select();
		$this->assign('list',$cate);
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
    	$model = D('Cate');
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
    	$model = D('Cate');
		//获取分类
//		$info = $model->select();
		$cate = $model->where('pid<>0')->select();

		$this->assign('list',$cate);
    	$this->display();
    }
}