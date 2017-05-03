<?php
namespace Admin\Model;
use Think\Model;

class NewsModel extends Model{
    protected $insertFields="title,content,message,cate_id";
    //设置修改时允许接收的字段
    protected $updateFields ="id,cate_id,title,content,message";
    //设置表单数据的接受规则
    protected $_validate=array(
        array('title','require','标题不能为空',1),
        array('content','require','内容不能为空',1),
//        array('entitle','require','英文标题不能为空',1),
    );


    protected function _before_insert(&$data,$option)
    {
//        $data['addtime']=time();
//        $data['updatetime'] = time();
        $data['content'] = $_POST['content'];
        $data['entitle'] = $_POST['entitle'];

//        dump($data);die;
//        dump($_FILES);DIE;
        /******* 判断用户有没有选择图片  ********/
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
//            dump($_FILES);exit;
            //上传图片
            $upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 * 1024,
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'rootPath' => './Public/Uploads/',
                'savePath' => 'News/'
            ));
            //上传文件
            $info = $upload->upload();
//            dump($info);exit;
            if ($info) {
                /*******生成缩略图********/
                //先取出刚刚上传成功的图片的路径和名称
                $logo = $info['logo']['savepath'] . $info['logo']['savename'];
                //拼出缩略图的名字
                $sm_logo = $info['logo']['savepath'] . 'sm_' . $info['logo']['savename'];
                $mid_logo = $info['logo']['savepath'] . 'mid_' . $info['logo']['savename'];
//                $bg_logo = $info['logo']['savepath'].'bg_'.$info['logo']['savename'];

                $image = new \Think\Image();
// 				dump($image);exit;
                $image->open("./Public/Uploads/" . $logo);
                $image->thumb(600, 300,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/Uploads/' . $mid_logo);
//                $image->thumb(800,400)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(285, 240,\Think\Image::IMAGE_THUMB_FIXED)->save("./Public/Uploads/" . $sm_logo);
                //把生成好的图片的路径放到表单中
                $data['logo'] = $mid_logo;
//                $data['bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['sm_logo'] = $sm_logo;

            }

        }
    }
    //修改前会自动执行
    protected function _before_update(&$data, $option)
    {
//        $data['updatetime'] = time();
        $data['content'] =$_POST['content'];
        /******* 判断用户有没有选择图片  ********/
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
//            dump($_FILES);exit;
            //上传图片
            $upload = new \Think\Upload(array(
                'maxSize' => 2*1024*1024,
                'exts'=>array('jpg','gif','png','jpeg'),
                'rootPath'=>'./Public/Uploads/',
                'savePath'=>'News/'
            ));
            //上传文件
            $info = $upload->upload();
//            dump($info);exit;
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
                $image->thumb(317,213)->save('./Public/Uploads/'.$mid_logo);
                $image->thumb(800,400)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(100,80)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['logo'] = $mid_logo;
                $data['bg_logo'] = $bg_logo;
// 				dump($data['big_logo']);exit;
                $data['sm_logo']=$sm_logo;

            }

            /*************删除原图*************/
            //取出原图
            $oldLogo = $this->field('sm_logo,bg_logo,logo')->find($option['where']['id']);
// 				dump($oldLogo);exit;
            //删除原图片
            @unlink('./Public/Uploads/'.$oldLogo['sm_logo']);
            @unlink('./Public/Uploads/'.$oldLogo['bg_logo']);
            @unlink('./Public/Uploads/'.$oldLogo['logo']);
        }
    }

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
        $data['data'] = $this->alias('a')
            ->field('a.*,b.cate_name')
            ->join('left join jd_cate b on a.cate_id=b.id ')
            ->where($where)->group('a.id')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        return $data;
    }


    /************* 其他方法 **************/


    public function getCateNews()
    {
        $cateModel = D('Cate');
        $cateData = $cateModel->select();
        foreach($cateData as $k=>$v)
        {
            $cateData[$k]['News']=$this->getNewsByCateId($v['id']);
        }
        return $cateData;
    }
    //获得某一分类下的所有商品
    public function getNewsByCateId($catId,$limit)
    {
        $NewsModel = D("News");
        return $NewsModel->field('id,title,content,message,updatetime')
            ->where(array(
                'cate_id'=>array('eq',$catId)
            ))->limit($limit)->select();
    }

}
