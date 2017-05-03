<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>
    <link rel="stylesheet" href="/jdzx/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/jdzx/Public/Admin/css/admin.css">
    <script src="/jdzx/Public/Admin/js/jquery.js"></script>
    <script src="/jdzx/Public/Admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-home"></strong> 欢迎您, <?php echo (session('username')); ?> <span class="icon-user"></span></div>
    <table class="table table-hover text-center">
        <tr>
            <td>操作环境</td>
            <td><?php echo php_uname('s');?></td>
        </tr>
        <tr>
            <td>运行环境</td>
            <td><?php echo php_sapi_name();?></td>
        </tr>
        <tr>
            <td>Apache版本</td>
            <td><?php echo ($apacheversion); ?></td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td><?php echo (PHP_VERSION); ?></td>
        </tr>
        <tr>
            <td>PHP运行方式</td>
            <td><?php echo ($_SERVER['GATEWAY_INTERFACE']); ?></td>
        </tr>
        <tr>
            <td>MYSQL版本</td>
            <td><?php echo ($mysqlversion); ?></td>
        </tr>
        <tr>
            <td>服务器地址</td>
            <td><?php echo ($_SERVER['SERVER_ADDR']); ?></td>
        </tr>

    </table>
</div>
</body>
</html>