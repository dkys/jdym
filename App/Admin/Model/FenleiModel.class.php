<?php
namespace Admin\Model;
use Think\Model;
class FenleiModel extends Model 
{
	protected $insertFields = 'cate_name,entitle,title';
	protected $updateFields = 'id,cate_name,title,entitle';
	protected $_validate = array(
		array('title', 'require', '项目名称不能为空！', 1),
		array('entitle', 'require', '项目英文名称不能为空！', 1),

	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}

    // 添加前
    protected function _before_insert(&$data, $option)
    {
        $data['entitle'] = $_POST['entitle'];
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
            $upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Fenlei/'
            ));

            $info = $upload->upload();
//            dump($info);die;
            if($info)
            {
                /*******生成缩略图********/
                //先取出刚刚上传成功的图片的路径和名称
                $logo = $info['logo']['savepath'] .$info['logo']['savename'];
                //拼出缩略图的名字
                $sm_logo = $info['logo']['savepath'].'sm_'.$info['logo']['savename'];
                $mid_logo = $info['logo']['savepath'].'mid_'.$info['logo']['savename'];
//                $bg_logo = $info['logo']['savepath'].'bg_'.$info['logo']['savename'];

                $image = new \Think\Image();
// 				dump($image);exit;
                $image->open("./Public/Uploads/".$logo);
                $image->thumb(387,370, \Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/'.$mid_logo);
//                $image->thumb(390,390)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(140,97)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['logo'] = $mid_logo;
//                $data['bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['sm_logo']=$sm_logo;
//                dump($data);die;
            }else
            {
                //先把错误信息保存到模型中，然后返回控制器，由控制器再从模型中取出错误原因并显示
                $this->error = $upload -> getError();
                return false;
            }
        }
    }
    // 修改前
    protected function _before_update(&$data, $option)
    {
        $data['content'] = $_POST['content'];
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
            $upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Fenlei/'
            ));

            $info = $upload->upload();
//            dump($info);die;
            if($info)
            {
                /*******生成缩略图********/
                //先取出刚刚上传成功的图片的路径和名称
                $logo = $info['logo']['savepath'] .$info['logo']['savename'];
                //拼出缩略图的名字
                $sm_logo = $info['logo']['savepath'].'sm_'.$info['logo']['savename'];
                $mid_logo = $info['logo']['savepath'].'mid_'.$info['logo']['savename'];
                $bg_logo = $info['logo']['savepath'].'bg_'.$info['logo']['savename'];

                $image = new \Think\Image();
// 				dump($image);exit;
                $image->open("./Public/Uploads/".$logo);
                $image->thumb(160,160,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/'.$mid_logo);
//                $image->thumb(390,390,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(140,97,\Think\Image::IMAGE_THUMB_FIXED)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['logo'] = $mid_logo;
//                $data['bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['sm_logo']=$sm_logo;
                //取出原图
                $oldLogo = $this->field('cate_sm_logo,cate_bg_logo,cate_logo')->find($option['where']['id']);
// 				dump($oldLogo);exit;
                //删除原图片
                @unlink('./Public/Uploads/'.$oldLogo['cate_sm_logo']);
                @unlink('./Public/Uploads/'.$oldLogo['cate_bg_logo']);
                @unlink('./Public/Uploads/'.$oldLogo['cate_logo']);
            }else
            {
                //先把错误信息保存到模型中，然后返回控制器，由控制器再从模型中取出错误原因并显示
                $this->error = $upload -> getError();
                return false;
            }
        }
    }

	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/

}