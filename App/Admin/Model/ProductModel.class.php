<?php
namespace Admin\Model;
use Think\Model;

class ProductModel extends Model{
    protected $insertFields="navtitle,content,fenlei_id,naventitle";
    //设置修改时允许接收的字段
    protected $updateFields ="id,fenlei_id,navtitle,content,naventitle";
    //设置表单数据的接受规则
    protected $_validate=array(
        array('navtitle','require','项目导航名称不能为空',1),
        array('content','require','内容不能为空',1),
        array('fenlei_id','require','请选择所属项目',1),
        array('naventitle','require','英文名称不能为空',1),
       
    );


    protected function _before_insert(&$data,$option){

        $data['content'] = $_POST['content'];

//        dump($data);
//        dump($_FILES);DIE;
        //上传图片
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
            //上传图片
            $upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Product/'
            ));
            //上传文件
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
                $image->thumb(160,160)->save('./Public/Uploads/'.$mid_logo);
                $image->thumb(479,479)->save('./Public/Uploads/'.$bg_logo);
                $image->thumb(100,80)->save("./Public/Uploads/".$sm_logo);
                //把生成好的图片的路径放到表单中
                $data['logo'] = $mid_logo;
                $data['bg_logo'] = $bg_logo;
// 				dump($data['bg_logo']);exit;
                $data['sm_logo']=$sm_logo;
            }else
            {
                //先把错误信息保存到模型中，然后返回控制器，由控制器再从模型中取出错误原因并显示
                $this->error = $upload -> getError();
                return false;
            }
        }

    }
    //删除前会自动执行
    protected function _before_delete($option)
    {
//     	dump($option);die;
        //删除原图片
        //取出原图
        $oldLogo = $this->field('sm_logo,bg_logo,logo')->find($option['where']['id']);
        //删除原图
        @unlink("./Public/Uploads/".$oldLogo['sm_logo']);
        @unlink("./Public/Uploads/".$oldLogo['bg_logo']);
        @unlink("./Public/Uploads/".$oldLogo['logo']);

        $newModel = M("Product");
        $newModel->where(array(
            'id' => array('eq',$option['where']['id'])
        ))->delete();

    }
    //修改前会自动执行
    protected function _before_update(&$data, $option)
    {

        $data['content'] = $_POST['content'];

        /******* 判断用户有没有选择图片  ********/
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
//            dump($_FILES);exit;
            //上传图片
            $upload = new \Think\Upload(array(
                'maxSize' => 2*1024*1024,
                'exts'=>array('jpg','gif','png','jpeg'),
                'rootPath'=>'./Public/Uploads/',
                'savePath'=>'Product/'
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
                $image->thumb(160,160)->save('./Public/Uploads/'.$mid_logo);
                $image->thumb(479,479)->save('./Public/Uploads/'.$bg_logo);
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
            ->field('a.*,b.title,b.sm_logo')
            ->join('left join jd_fenlei b on a.fenlei_id=b.id ')
            ->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
        return $data;
    }


    /************* 其他方法 **************/


    public function getFenleiProduct()
    {
        $fenleiModel = D('Fenlei');
        $fenleiData = $fenleiModel->select();
        foreach($fenleiData as $k=>$v)
        {
            $fenleiData[$k]['Product']=$this->getProductByFenleiId($v['id']);
        }
        return $fenleiData;
    }
    //获得某一分类下的所有商品
    public function getProductByFenleiId($fenleiId,$limit)
    {
        $ProductModel = D("Product");
        return $ProductModel->field('id,title,content,logo,sm_logo,bg_logo,message')
            ->where(array(
                'fenlei_id'=>array('eq',$fenleiId)
            ))->limit($limit)->select();
    }

}
