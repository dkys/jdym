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
	<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/animate.css"/>
	<script src="/jdzx/Public/Home/js/jquery-1.11.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/jdzx/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
	<script src="/jdzx/Public/Home/js/wow.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var theUA = window.navigator.userAgent.toLowerCase();
		if((theUA.match(/msie\s\d+/) && theUA.match(/msie\s\d+/)[0]) || (theUA.match(/trident\s?\d+/) && theUA.match(/trident\s?\d+/)[0])) {
			var ieVersion = theUA.match(/msie\s\d+/)[0].match(/\d+/)[0] || theUA.match(/trident\s?\d+/)[0];
			if(ieVersion < 10) {
				var str = "你的浏览器版本太低了\n请换一个可以支持的浏览器 :(";
				var str2 = "推荐使用:<a href='https://www.baidu.com/s?ie=UTF-8&wd=%E8%B0%B7%E6%AD%8C%E6%B5%8F%E8%A7%88%E5%99%A8' target='_blank' style='color:#cc0'>谷歌</a>," +
						"<a href='https://www.baidu.com/s?ie=UTF-8&wd=%E7%81%AB%E7%8B%90%E6%B5%8F%E8%A7%88%E5%99%A8' target='_blank' style='color:#cc0'>火狐</a>," +
						"<a href='https://www.baidu.com/s?ie=UTF-8&wd=%E7%8C%8E%E8%B1%B9%E6%B5%8F%E8%A7%88%E5%99%A8' target='_blank' style='color:#cc0'>猎豹</a>,其他双核急速模式";
				document.writeln("<pre style='text-align:center;color:#fff;background-color:#0cc; height:100%;border:0;position:fixed;top:0;left:0;width:100%;z-index:1234'>" +
						"<h2 style='padding-top:200px;margin:0'><strong>" + str + "<br/></strong></h2><p>" +
						str2 + "</p><h2 style='margin:0'><strong>如果你的使用的是双核浏览器,请切换到极速模式访问<br/></strong></h2></pre>");
				document.execCommand("Stop");
			};
		}
	</script>
</head>
<body>
<!--返回顶部开始-->
<div class="back"><a href="#back" target="_self">
	<img class="arrow" src="/jdzx/Public/Home/images/icon-top.png" />
	<div class="cont">TOP</div>
</a></div>
<script type="text/javascript" charset="utf-8">
    $(function(){
        $(".gy").addClass('on');
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
	});


</script>
<!--公共头部开始-->
<!--<div class="header">
	<div class="inner">
		<a class="logo" href="index.html"><img src="/jdzx/Public/Home/images/logo.png"/></a>
		<div class="language"><span class="on">中</span>|<span>EN</span></div>
		<span class="btn"></span>
		<ul class="nav">
			<li class="list"><a href="<?php echo U('index/index');?>">首页</a></li>
			<li class="on"><a href="<?php echo U('about/about');?>">关于我们</a></li>
			<li class="list"><a href="<?php echo U('immigrant/immigrant');?>">移民</a></li>
			<li class="list"><a href="<?php echo U('visa/visa');?>">签证</a></li>
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
		
		<!--关于我们开始-->
		<div class="about">
			<div class="inner">
				<div class="title">
					<p class="en">ABOUT US</p>
					<p class="cn">关于我们</p>
				</div>
				<p class="brief">
					加鼎移民留学是加拿大卑诗省注册的专业移民留学顾问公司，旨在服务海外投<br />
					资和技术人才以及加拿大本地留学生。公司移民顾问团队经验丰富，擅长加拿大魁北克<br />
					投资移民，技术移民，团聚移民，各省省提名技术移民和商业移民。迄今为止已经服务了众多海外<br />
					人才和留学生移民，至今保持零拒签和良好的口碑。
				</p>
				<ul class="list">
					<li><img src="/jdzx/Public/Home/images/about-01.jpg"/></li>
					<li><img src="/jdzx/Public/Home/images/about-02.jpg"/></li>
					<li><img src="/jdzx/Public/Home/images/about-03.jpg"/></li>
					<li><img src="/jdzx/Public/Home/images/about-04.jpg"/></li>
				</ul>
			</div>
		</div>
		<!--关于我们结束-->
		
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
		
	</body>
</html>