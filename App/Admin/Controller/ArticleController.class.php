<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/11/1 13:22
 */

namespace Admin\Controller;
use Think\Controller;

class ArticleController extends BaseController
{
    public function fileManagerJson()
    {
//根目录路径，可以指定绝对路径，比如 /var/www/attached/
        $root_path = $_SERVER["DOCUMENT_ROOT"].__ROOT__.'/Public/Uploads/';
//根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
        $root_url = "http://".$_SERVER['SERVER_NAME'].__ROOT__."/Public/Uploads/";
//图片扩展名
//图片扩展名
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
//目录名
        $dir_name = empty($_GET['dir']) ? '' : trim($_GET['dir']);
        if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
            echo "Invalid Directory name.";
            exit;
        }
        if ($dir_name !== '') {
            $root_path .= $dir_name . "/";
            $root_url .= $dir_name . "/";
            if (!file_exists($root_path)) {
                mkdir($root_path);
            }
        }

//根据path参数，设置各路径和URL
        if (empty($_GET['path'])) {
            $current_path = realpath($root_path) . '/';
            $current_url = $root_url;
            $current_dir_path = '';
            $moveup_dir_path = '';
        } else {
            $current_path = realpath($root_path) . '/' . $_GET['path'];
            $current_url = $root_url . $_GET['path'];
            $current_dir_path = $_GET['path'];
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
        echo realpath($root_path);
//排序形式，name or size or type
        $order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

//不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
            echo 'Access is not allowed.';
            exit;
        }
//最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
            echo 'Parameter is not valid.';
            exit;
        }
//目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
            echo 'Directory does not exist.';
            exit;
        }

//遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.') continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true; //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0; //文件大小
                    $file_list[$i]['is_photo'] = false; //是否图片
                    $file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename; //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }

//排序
        function cmp_func($a, $b) {
            global $order;
            if ($a['is_dir'] && !$b['is_dir']) {
                return -1;
            } else if (!$a['is_dir'] && $b['is_dir']) {
                return 1;
            } else {
                if ($order == 'size') {
                    if ($a['filesize'] > $b['filesize']) {
                        return 1;
                    } else if ($a['filesize'] < $b['filesize']) {
                        return -1;
                    } else {
                        return 0;
                    }
                } else if ($order == 'type') {
                    return strcmp($a['filetype'], $b['filetype']);
                } else {
                    return strcmp($a['filename'], $b['filename']);
                }
            }
        }
        usort($file_list, 'cmp_func');

        $result = array();
//相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
//相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
//当前目录的URL
        $result['current_url'] = $current_url;
//文件数
        $result['total_count'] = count($file_list);
//文件列表数组
        $result['file_list'] = $file_list;

//输出JSON字符串
        $this->ajaxReturn($result);
    }
    
	public function uploadJson()
    {
        $Upload=A('Upload','Event');

        $Upload->kindUpload();

    }
    public function addpage()
    {
        $model=M('category');
        $cate = $model->select();
        $this->assign("cate",$cate);
        $this->display();
    }
   

    public function actaddpage()
    {
        if(M('news')->add($_POST))
        {
            $this->success("添加成功");
        }
        else
        {
            $this->success("添加失败");
        }
        
    }
    
    public function pagelist()
    {
        $M=M('news');
        if(!empty($_GET['keywords']))
        {
            $map['title'] = array("LIKE","%{$_GET['keywords']}%");
            $this->assign('keywords',$_GET['keywords']);
        }

        $D=D('Article');
        $count      = $D->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $news=$D->where($map)->order('publish_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('news',$news);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function showpage()
    {
        $D=D('Article');
        $news=$D->where('fabu=1')->find($_GET['id']);
        $this->assign("news",$news);
        $this->display();

    }
    public function updatepage()
    {
        $id=I('post.id');
        $model = M('news');
        $as = $model->where('id='.$id)->save(I('post.'));
        if($as)
        {
            $this->success("修改成功");
        }
        else
        {
            $this->success("修改失败");
        }

    }
    public function delete()
    {
        $M=M('category');

        if($M->delete($_GET['id']))
            $this->success("删除成功");
        else
            $this->error("删除失败");

    }
    public function deleteAll()
    {
        if(!empty($_POST))
        {

            $str=implode(",",$_POST['id']);
            $M=M('news');
            if($M->delete($str))
                $this->success("删除成功");
            else
                $this->error("删除失败");
        }

    }
  
    public function programlist()
    {
        if(!empty($_GET['keywords']))
        {
            $map['title'] = array("LIKE","%{$_GET['keywords']}%");
            $this->assign('keywords',$_GET['keywords']);
        }
        $M=M('program');

        $count      = $M->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $program=$M->where($map)->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('program',$program);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }

}