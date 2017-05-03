<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/22
 * Time: 9:15
 */

namespace Index\Controller;


class CaseController extends BaseController
{
    public static $num = 0;
    public function cases()
    {
        layout(true);
//        $num = self::$num++;
//        echo $num;
        $newsmod = D('News');
        $catemod = D('Cate');
        $catep = $catemod->where("cate_name='案例'and pid=0")->find();
        $cateinfo = $catemod->where("pid={$catep['id']}")->order('sort asc')->select();
        $cateid = I('get.cateid');
        if(!$cateid){
            $cateid = $cateinfo[0]['id'];
        }

//        dump($cateinfo);
        $info = $newsmod->newsInfo($cateid);
        $this->assign('cateinfo',$cateinfo);
        $this->assign('info',$info);
        $this->display();
    }

    public function ajaxNewsInfo() {
        if(IS_AJAX){
           $newsmod = D('News');
            $catemod = D('Cate');
            $catep = $catemod->where("cate_name='案例'and pid=0")->find();
            $cateinfo = $catemod->where("pid={$catep['id']}")->order('sort asc')->select();
            $cateid = $_POST['cateid'];
            if(!$cateid){
                $cateid = $cateinfo[0]['id'];
            }
            $modnews = D('News');
            $newsinfo = $modnews->newsInfo($cateid,$_POST['first']);
            if(!$newsinfo){
                $newsinfo['error'] = '没有更多内容了！';
            }

            $this->ajaxReturn($newsinfo);
        }
    }
    public function caseDetail()
    {
        layout(true);
        $newsmod = D('News');
        $newsinfo = $newsmod->where("id={$_GET['newsid']}")->find();
        $this->assign('info',$newsinfo);
        $this->display();
    }


}