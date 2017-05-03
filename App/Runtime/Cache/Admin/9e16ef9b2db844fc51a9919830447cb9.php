<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/jdzx/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/jdzx/Public/Admin/css/admin.css">
    <link rel="stylesheet" href="/jdzx/Public/layui/css/layui.css"  media="all">
    <script src="/jdzx/Public/Admin/js/jquery.js"></script>
    <script src="/jdzx/Public/Admin/js/pintuer.js"></script>
    <script src="/jdzx/Public/layer/layer.js"></script>
    <script src="/jdzx/Public/layui/layui.js" charset="utf-8"></script>
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">
            </div>
            <form action="<?php echo U('Login/login');?>" method="post">
                <div class="panel loginbox">
                    <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                    <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="text" class="input input-big" name="username" placeholder="登录账号" " />

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="password" class="input input-big" name="password" placeholder="登录密码"  />

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field">
                                <input type="text" class="input input-big" name="chk_code" placeholder="填写右侧的验证码" />

                                <img onclick="this.src='<?php echo U('Login/chk_code');?>?#='+Math.random()" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" src="<?php echo U('Login/chk_code');?>">

                            </div>
                        </div>
                    </div>
                    <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>