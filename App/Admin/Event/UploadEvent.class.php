<?php

/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/10/27 9:39
 */
namespace Admin\Event;
use Think\Controller;
use Think\Image;
class UploadEvent extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //检测是否有目录
        file_exists('./Public/Uploads/')?:mkdir('./Public/Uploads/');

    }

    protected $config = array(
        'maxSize'    =>    3145728,
        'savePath'   =>    '',
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'rootPath'   => './Public/Uploads/',
    );

    public function uploadOne($key='product_img')
    {


        $upload = new \Think\Upload($this->config);// 实例化上传类

        $info   =   $upload->uploadOne($_FILES[$key]);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }
        else
        {
            return $info['savepath'].$info['savename'];
        }
    }
    public function thumb_center($width,$height,$path)
    {
        $image = new Image();
        $rootpath = './Public/Uploads/';
        $image->open($rootpath.$path);
        $image->thumb($width, $height,\Think\Image::IMAGE_THUMB_CENTER)->save($rootpath.$path);
        return $path;
    }
    public function small_thumb_center($width,$height,$path)
    {
        $image = new Image();
        $rootpath = './Public/Uploads/';
        $patharr = explode('/',$path);
        $savepath = $patharr[0].'/'.$width.'x'.$height.$patharr[1];
        $image->open($rootpath.$path);
        $image->thumb($width, $height,\Think\Image::IMAGE_THUMB_CENTER)->save($rootpath.$savepath);
        return $savepath;

    }
    public function uploadAll($product_id)
    {


        $upload = new \Think\Upload($this->config);// 实例化上传类

        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError(),"Product/lookproduct");
        }else{// 上传成功 获取上传文件信息
            $arr=array();
            foreach($info as $k=>$file){
                $arr[$k]['product_id']=$product_id;
                $arr[$k]['detail_img']=$file['savepath'].$file['savename'];
            }
            return $arr;
        }

    }
    public function upload_Json()
    {
        $upload = new \Think\Upload($this->config);// 实例化上传类

        $upload->saveName="article".uniqid();

        $info   =   $upload->uploadOne($_FILES['file']);

        if(!$info) {// 上传错误提示错误信息
            $data['code']=0;
            $data['msg']=$upload->getError();
        }else{// 上传成功 获取上传文件信息

            $data['code']=1;

            //$data['name'] = $info['savename'];

            $path="http://".$_SERVER['SERVER_NAME'].__ROOT__."/Public/Uploads/";

            $data['url']=$path.$info['savepath'].$info['savename'];

            echo json_encode($data);
        }
    }
    public function bannerUpload()
    {

        $upload = new \Think\Upload($this->config);// 实例化上传类

        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            $_POST['imgsrc']=$info['imgsrc']['savepath'].$info['imgsrc']['savename'];

            //剪成小图
            $_POST['small'] = $this->small_thumb_center(768,300,$_POST['imgsrc']);
            $m=M('banner');

            if($m->add($_POST))
            {
                $this->success("上传成功");
            }
            else
                $this->success("上传失败");

        }

    }
    
    
    public function doc_upload()
    {
        $upload = new \Think\Upload($this->config);// 实例化上传类
        $upload->exts      =     array('txt','doc','xls','ppt','pdf','chm','zip','rar'); // 设置附件上传类型
		$upload->maxSize = 31457280;

        $info   =   $upload->uploadOne($_FILES['doc']);

        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError(),"document");
            exit();
        }
        else
        {
            $data['doc_name']=$info['name'];
            $data['doc_path']=$info['savepath'].$info['savename'];
            $data['doc_size']=format_bytes($info['size']);
            $data['doc_time']=time();
            return $data;
        }


    }

    public function kindUpload()
    {

        $upload = new \Think\Upload($this->config);// 实例化上传类
        $info   =   $upload->uploadOne($_FILES['imgFile']);

        if(!$info) {// 上传错误提示错误信息
            $data['error']=1;
            $data['message']=$upload->getError();
        }else{// 上传成功 获取上传文件信息
            $data['error']=0;
            //$data['name'] = $info['savename'];
            $path="http://".$_SERVER['SERVER_NAME'].__ROOT__."/Public/Uploads/";
            $data['url']=$path.$info['savepath'].$info['savename'];

        }
        echo json_encode($data);
    }



}