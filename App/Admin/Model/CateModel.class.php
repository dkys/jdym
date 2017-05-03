<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model 
{
	protected $insertFields = array('cate_name','pname');
	protected $updateFields = array('id','cate_name','pname');
	protected $_validate = array(
		array('pname', 'require', '请选择上级分类！', 1, 'regex', 3),
		array('cate_name', 'require', '分类名称不能为空！', 1, 'regex', 3),
		array('cate_name', '1,150', '分类名称的值最长不能超过 150 个字符！', 1, 'length', 3),
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
		if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
		{
			$upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Cate/'
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
                $image->thumb(390,180)->save('./Public/Uploads/'.$mid_logo);
                $image->thumb(390,390)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(140,97)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['cate_logo'] = $mid_logo;
                $data['cate_bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['cate_sm_logo']=$sm_logo;
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
		if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
		{
			$upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Cate/'
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
                $image->thumb(390,180,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/'.$mid_logo);
                $image->thumb(390,390,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(140,97,\Think\Image::IMAGE_THUMB_FIXED)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['cate_logo'] = $mid_logo;
                $data['cate_bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['cate_sm_logo']=$sm_logo;
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

    //无限分类
    public function wxFl($data,$pid=0)
    {
        $tree = array();
        if($data){
            foreach($data as $k=>$v){
                if($v['pid'] == $pid){
                    $tree[] = $v;
                    $temp = $this->wxFl($data, $v['id']);
                    $tree = array_merge($tree,$temp);
                }
            }
        }
        return $tree;

    }

    //面包屑导航
    public function mbNav($data,$id=0)
    {
        $tree = array();
        foreach($data as $v) {
            if($v['id'] == $id) {// 判断要不要找父栏目
                if($v['parent'] > 0) { // parnet>0,说明有父栏目
                    $tree = array_merge($tree,$this->mbNav($data,$v['parent']));
                }
                $tree[] = $v; // 以找到上地为例
            }
        }
        return $tree;
    }
	/************************************ 其他方法 ********************************************/

}