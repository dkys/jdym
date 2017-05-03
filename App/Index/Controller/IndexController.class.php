<?php
namespace Index\Controller;

class IndexController extends BaseController {

    public function index(){
        layout(true);
        //获取轮播图
        $advmod = D('Adv');
        $advinfo = $advmod->advInfo();
        
        //获取文章列表
        $news = D('News');
        $newsinfo = $news->newsInfo2();
        $this->assign('newsinfo',$newsinfo);
        $this->assign('advinfo',$advinfo);
        $this->display();
    }
}