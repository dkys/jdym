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
		<script src="/jdzx/Public/Home/js/map.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--返回顶部开始-->
		<div class="back"><a href="#back" target="_self">
			<img class="arrow" src="/jdzx/Public/Home/images/icon-top.png" />
			<div class="cont">TOP</div>
		</a></div>
		<script type="text/javascript" charset="utf-8">
			window.onscroll = function() {
				var t = document.documentElement.scrollTop || document.body.scrollTop;
				if(t > 200) {
					$(".back").show();
				} else {
					$(".back").hide();
				}
			}
                         $('.en').hide();
			$('.back').click( function () {
				$('body,html').animate({scrollTop:0},300);
			})
		</script>
		<!--返回顶部结束-->
		
		
		<!--公共头部开始-->
<!--		<div class="header">
			<div class="inner">
				<a class="logo" href="index.html"><img src="/jdzx/Public/Home/images/logo.png"/></a>
                                <div class="language"><span id="zn" class="on">中</span>|<span id="en">EN</span></div>
				<span class="btn"></span>
				<ul class="nav">
					<li class="list"><a href="<?php echo U('index/index');?>">首页</a></li>
					<li><a href="<?php echo U('about/about');?>">关于我们</a></li>
					<li class="list cn"><a href="<?php echo U('immigrant/immigrant');?>">移民</a></li>
					<li class="list cn"><a href="<?php echo U('visa/visa');?>">签证</a></li>
					<li class="list cn"><a href="<?php echo U('case/cases');?>">案例</a></li>
					<li class="on"><a href="<?php echo U('contact/contact');?>">联系我们</a></li>
				</ul>
			</div>
		</div>-->
		<!--公共头部结束-->
              
		<!--banner开始-->
		<div class="banner-wrap">
			<div class="banner"><img src="/jdzx/Public/Home/images/banner-sec.jpg"/></div>
		</div>
		<!--banner结束-->
		
		<!--联系我们开始-->
		<div class="contact">
			<div class="inner clear">
				<div class="title">
					<p class="en">CONTACT US</p>
					<p class="cn">联系我们</p>
				</div>
				<div class="left">
					<div class="infor">
						<p>电话：+1 604.716.6888</p>
						<p>邮箱：info@canleading.com</p>
						<p>地址：860-5900 No.3 Road, Richmond, BC V6X 3P7</p>
					</div>
					<img class="mark" src="/jdzx/Public/Home/images/mark.jpg"/>
					<p class="tip">【关注我们】</p>
				</div>
				<div class="map" id="dituContent"></div>
			</div>
		</div>
		<!--联系我们结束-->
		
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
		
		<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
		<script src="/jdzx/Public/Home/js/map.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>