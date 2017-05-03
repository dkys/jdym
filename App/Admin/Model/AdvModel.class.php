<?php
namespace Admin\Model;
use Think\Model;

class AdvModel extends Model{
    protected $insertFields = "title";
    public function _before_insert(&$data,$option)
    {
//        dump($_FILES);
        //上传图片
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0)
        {
            $upload = new \Think\Upload(array(
                'maxSize' => 2 * 1024 *1024,
                'exts'    => array('jpg','gif','png','jpeg'),
                'rootPath'=> './Public/Uploads/',
                'savePath'=> 'Lunbo/'
            ));
            //上传文件
            $info = $upload->upload();
//            dump($info);
            $logo = $info['logo']['savepath'] .$info['logo']['savename'];
            $data['logo'] = $logo;
//            dump($data);die;

        }
    }
}
