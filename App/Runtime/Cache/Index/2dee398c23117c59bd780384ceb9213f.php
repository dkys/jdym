<?php if (!defined('THINK_PATH')) exit();?>
<!--公共头部开始-->
<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
		<div class="header">
			<div class="inner">
				<a class="logo" href="index.html"><img src="/jdzx/Public/Home/images/logo.png"/></a>
				<a class="logo-name" href="<?php echo U('Index/index');?>">加鼎移民</a>
                                <div class="language"><span id='zn' class="on">中</span>|<span id="en">EN</span></div>
				<span class="btn"></span>
				<ul class="nav">
					<li class="sy cn"><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li class="sy en"><a href="<?php echo U('Index/index');?>">HOME</a></li>
					<li class="gy cn"><a href="<?php echo U('About/about?nav=2');?>">关于我们</a></li>
					<li class="gy en"><a href="<?php echo U('About/about?nav=2');?>">ABOUT</a></li>
					<li class="ym cn"><a href="<?php echo U('Immigrant/immigrant?nav=3');?>">移民</a></li>
                                        <li class="qz cn"><a href="<?php echo U('Visa/visa?nav=4');?>">签证</a></li>
                                        <li class="al cn"><a href="<?php echo U('Case/cases?nav=5');?>">案例</a></li>
					<li class="lx cn"><a href="<?php echo U('Contact/contact?nav=6');?>">联系我们</a></li>
					<li class="lx en"><a href="<?php echo U('Contact/contact?nav=6');?>">CONTACT US</a></li>
				</ul>
                                <div class="search">
                                    <form action="<?php echo U('Search/search');?>" method="post">
                                        <input class="inpTxt" placeholder="请输入手机号查询" name="keywords" type="text" />
					<input class="inpBtn" type="submit" value=""/>
                                    </form>
				</div>
			</div>
		</div>
            <script type="text/javascript">
                    $(function(){
                        $('#en').click(function(){
                        $('.cn').hide();
                        $('.en').show();
                    });
                    $('#zn').click(function(){
                        $('.cn').show();
                        $('.en').hide();
                    });
              
                    });
                  
            </script>
		<!--公共头部结束-->
<script type="text/javascript" charset="utf-8"></script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>加鼎移民</title>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/base.css"/>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/second.css"/>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/animate.css"/>
		<script src="/jdzx/Public/Home/js/jquery-1.11.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
		<script src="/jdzx/Public/Home/js/wow.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		
		<!--返回顶部开始-->
		<div class="back"><a href="#back" target="_self">
			<img class="arrow" src="/jdzx/Public/Home/images/icon-top.png" />
			<div class="cont">TOP</div>
		</a></div>
		<script type="text/javascript" charset="utf-8">
                    $(function(){
                        $(".qz").addClass('on');
                    });
			window.onscroll = function() {
				var t = document.documentElement.scrollTop || document.body.scrollTop;
				if(t > 200) {
					$(".back").show();
				} else {
					$(".back").hide();
				}
			}
			$('.back').click( function () {
				$('body,html').animate({scrollTop:0},300);
			})
		</script>
		<!--返回顶部结束-->
		
		<!--公共头部开始-->
<!--		<div class="header">
			<div class="inner">
				<a class="logo" href="index.html"><img src="/jdzx/Public/Home/images/logo.png"/></a>
				<div class="language"><span class="on">中</span>|<span>EN</span></div>
				<span class="btn"></span>
				<ul class="nav">
					<li class="list"><a href="<?php echo U('index/index');?>">首页</a></li>
					<li><a href="<?php echo U('about/about');?>">关于我们</a></li>
					<li class="list"><a href="<?php echo U('immigrant/immigrant');?>">移民</a></li>
					<li class="on"><a href="<?php echo U('visa/visa');?>">签证</a></li>
					<li class="list"><a href="<?php echo U('case/cases');?>">案例</a></li>
					<li class="list"><a href="<?php echo U('contact/contact');?>">联系我们</a></li>
				</ul>
			</div>
		</div>-->
		<!--公共头部结束-->
		
		<!--banner开始-->
		<div class="banner-wrap">
			<div class="banner"><img src="/jdzx/Public/Home/images/banner-sec.jpg"/></div>
		</div>
		<!--banner结束-->

		<!--签证开始-->
		<div class="visa">
			<div class="inner">
				<div class="tit"><span class="tit-cnt">热门项目</span></div>
				<div class="tip">通过风险评估体系，延续成功经验，同业领先</div>
				<ul id='list' class="list">
                                    <?php if(is_array($list)): foreach($list as $key=>$v): ?><li><a href="<?php echo U('visa/visadetail?nav=4&proid='.$v['id']);?>">
						<img src="/jdzx/Public/Uploads/<?php echo ($v["logo"]); ?>"/>
						<div class="mask">
							<p class="cn"><?php echo ($v["title"]); ?></p>
							<p class="en"><?php echo ($v["entitle"]); ?></p>
						</div> 	 
					</a></li><?php endforeach; endif; ?>
				</ul>
				<div class="more">更多</div>
			</div>
		</div>
		<!--签证结束-->
		
		<!--公共底部开始-->
		<div class="footer">
			<div class="inner clear">
				<p class="copyright">加拿大加鼎移民留学咨询有限公司版权所有 <br />技术支持：<a href="http://www.rzxid.com">郑州瑞之雪科技</a></p>
				<div class="share bdsharebuttonbox">
					<a class="circle qq bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
					<a class="circle wexin bds_weixin" data-cmd="weixin" title="分享到微信"></a>
					<a class="circle weibo bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				</div>
			</div>
		</div>
		<script>
			window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":["tieba","bdhome","thx","meilishuo","mogujie","diandian","huaban","duitang","hx","fx","youdao","sdo","qingbiji","people","xinhua","mail","isohu","yaolan","wealink","ty","iguba","fbook","twi","linkedin","h163","evernotecn","copy","print"],"bdPic":"","bdStyle":"2","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		</script>
		<script type="text/javascript">
			new WOW().init();
		</script>
		<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
		<!--公共底部结束-->
                <script>

                    //***************************************更多功能实现************************************************     
                        var cateid = "<?php echo $_GET['cateid'];?>";
//                        alert(cateid);
                        var ofset = 0;
//                        //发送ajax请求将分类id和分页参数传递到后台
                        var url = "<?php echo U('Visa/ajaxPro');?>";
                        $('.more').click(function(){
                            ofset = ofset+3;
//                             alert(url);
                            $.post(url,
                            {
                                first:ofset,
                                cateid:cateid
                            },
                            function(data){
                                if(data){
                                    $.each(data,function(key,v){
                                        $('#list').append('<li><a href="<?php echo U('Visa/visadetail?nav=4');?>/proid/'+v.id+'"><img src="/jdzx/Public/Uploads/'+v.logo+'"/><div class="mask"><p class="cn">'+v.title+'</p><p class="en">'+v.entitle+'</p></div></a></li>');
                                    });
                                }
                            }
                         );
                        });
                </script>
		
	</body>
</html>