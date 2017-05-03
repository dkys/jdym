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
		<title>加鼎咨询</title>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/base.css"/>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="/jdzx/Public/Home/css/animate.css"/>
		<script src="/jdzx/Public/Home/js/jquery-1.11.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/jdzx/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.result{ width: 300px; margin: 60px auto; min-height: 600px;}
			.title{ text-align: center; font-size: 30px; color: #000; margin-bottom: 30px;}
			dl{ overflow: hidden; margin-bottom: 15px;}
			dt{ float: left; width: 80px; font-size: 16px; color: #222;}
			dd{ float: left; width: 220px; font-size: 16px; color: #444;}
		</style>
	</head>
	<body>
		<!--返回顶部开始-->
		<div class="back"><a href="#back" target="_self">
			<img class="arrow" src="images/icon-top.png" />
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
			$('.back').click( function () {
				$('body,html').animate({scrollTop:0},300);
			})
		</script>
		<!--返回顶部结束-->
		
		<!--公共头部开始-->
<!--		<div class="header">
			<div class="inner clear">
				<a class="logo" href="index.html"><img src="images/logo.png"/></a>
				<a class="logo-name" href="index.html">加鼎移民</a>
				<div class="language"><span class="on">中</span>|<span>EN</span></div>
				<span class="btn"></span>
				<ul class="nav">
					<li class="on"><a href="index.html">首页</a></li>
					<li><a href="about.html">关于我们</a></li>
					<li><a href="immigrant.html">移民</a></li>
					<li><a href="visa.html">签证</a></li>
					<li><a href="case.html">案例</a></li>
					<li><a href="contact.html">联系我们</a></li>
				</ul>
				<div class="search">
					<input class="inpTxt" type="text" />
					<input class="inpBtn" type="button"/>
				</div>
			</div>
		</div>-->
		<!--公共头部结束-->
		
		<!--查询结果-->
		<div class="result">
			<div class="title">查询结果</div>
			<dl>
				<dt>姓名：</dt>
				<dd><?php echo ($info["name"]); ?></dd>
			</dl>
			<dl>
				<dt>手机号：</dt>
				<dd><?php echo ($info["mobile"]); ?></dd>
			</dl>
			<dl>
				<dt>护照号：</dt>
				<dd><?php echo ($info["passport"]); ?></dd>
			</dl>
			<dl>
				<dt>申请项目：</dt>
				<dd><?php echo ($info["pro"]); ?></dd>
			</dl>
			<dl>
				<dt>申请时间：</dt>
				<dd><?php echo ($info["adddate"]); ?></dd>
			</dl>
			<dl>
				<dt>状态：</dt>
				<dd><?php echo ($info["status"]); ?></dd>
			</dl>
			
		</div>
		
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
		<!--公共底部结束-->
		<script>
			window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":["tieba","bdhome","thx","meilishuo","mogujie","diandian","huaban","duitang","hx","fx","youdao","sdo","qingbiji","people","xinhua","mail","isohu","yaolan","wealink","ty","iguba","fbook","twi","linkedin","h163","evernotecn","copy","print"],"bdPic":"","bdStyle":"2","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		</script>
		<script type="text/javascript">
			new WOW().init();
		</script>
		<script src="/jdzx/Public/Home/js/base.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>