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

		<!--&lt;!&ndash;返回顶部开始&ndash;&gt;-->
		<div class="back"><a href="#back" target="_self">
			<img class="arrow" src="/jdzx/Public/Home/images/icon-top.png" />
			<div class="cont">TOP</div>
		</a></div>
		<script type="text/javascript" charset="utf-8">
                    $(function(){
                        var nav = "<?php echo $_GET['nav']; ?>";
                        if(nav == 4){
                            $(".qz").addClass('on');
                        }
                        
                        if(nav == 3){
                            $(".ym").addClass('on');
                        }
                        
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
					<li><a href="<?php echo U('case/cases');?>">案例</a></li>
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
		
		<!--索引开始-->
		<div class="top">
			<div class="inner">
                            <div class="bread">您的位置：<a href="<?php echo U('Index/index');?>">首页</a> > <?php if($_GET['nav'] == 3): ?><a href="<?php echo U('Immigrant/immigrant');?>">热门项目</a><?php else: ?><a href="<?php echo U('Visa/visa');?>">热门项目</a><?php endif; ?> > <a href="####">项目详情</a></div>
				<div class="hot">咨询热线（全国）<br /> 400-188-75732</div>
				<ul class="nav">
					<?php if(is_array($proinfo)): foreach($proinfo as $key=>$v): ?><li><?php echo ($v["navtitle"]); ?></li><?php endforeach; endif; ?>

				</ul>
			</div>
		</div>
		<!--索引结束-->
		
		<!--案例详情开始-->
		<div class="content">
			<div class="inner">
				<ul class="list">
                                    <?php if(is_array($proinfo)): foreach($proinfo as $key=>$vo): ?><li>
						<div class="tit">
							<div class="tit-cn"><?php echo ($vo["navtitle"]); ?></div>
							<div class="tit-en"><?php echo ($vo["naventitle"]); ?></div>
						</div>
						<div class="cnt">
							<!--测试用-删除-->
							<?php echo ($vo["content"]); ?>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			$('.top .nav li').click( function () {
				var index=$(this).index();
				$(this).addClass('on').siblings().removeClass('on');
				var len=$('.list li').eq(index).position().top-100;
				$('body').animate({
					'scrollTop':len
				},300)
			})
			
			$(window).scroll(function () {
			var top=$('.top').position().top;
				if ($('body').scrollTop()>=top) {
					
					$('.top .nav').css({
						'position':'fixed',
						'top':'0',
						'left':'50%',
						'margin-left':'-600px',
						'bottom':'auto',
						'padding-top':'20px',
						'box-shadow':'0 5px 10px #eee'
					})
				} else {
					
					$('.top .nav').css({
						'position':'relative',
						'top':'auto',
						'left':'50%',
						'margin-left':'-600px',
						'bottom':'0px',
						'padding-top':'10px',
						'box-shadow':'none'
					})
				}
			})
		</script>
		<!--案例详情结束-->
		
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