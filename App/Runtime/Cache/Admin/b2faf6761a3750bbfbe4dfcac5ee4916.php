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
    <script src="/jdzx/Public/Admin/js/jquery.js"></script>
    <script src="/jdzx/Public/Admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo U('edit');?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            <div class="form-group">
                <div class="label">
                    <label>客户名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($data["name"]); ?>" name="name" data-validate="required:请输入客户名称" />
                    <div class="tips"></div>
                </div>
            </div>


            <div class="clear"></div>
            
            <div class="form-group">
                <div class="label">
                    <label>手机号：</label>
                </div>
                <div class="field">
                    <input type="text" value="<?php echo ($data["mobile"]); ?>" class="input w50" name="mobile" data-validate="required:请输入客户手机号" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            
            
            <div class="clear"></div>
            

            <div class="form-group">
                <div class="label">
                    <label>护照编号：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($data["passport"]); ?>" name="passport" data-validate="required:请输入客户护照编号" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            
              <div class="form-group">
                <div class="label">
                    <label>出生日期：</label>
                </div>
                <div class="field">
                    <input type="date" class="input w50" value="<?php echo ($data["birthday"]); ?>" name="birthday" data-validate="required:请输入客户出日期" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            
            <div class="form-group">
                <div class="label">
                    <label>申请日期：</label>
                </div>
                <div class="field">
                    <input type="date" class="input w50" value="<?php echo ($data["adddate"]); ?>" name="adddate" data-validate="required:请输入客户申请日期" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            
            <div class="form-group">
                <div class="label">
                    <label>申请状态：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($data["status"]); ?>" name="status" data-validate="required:请输入客户申请状态" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>
            
            <div class="form-group">
                <div class="label">
                    <label>申请项目：</label>
                </div>
                <div class="field">
                    <textarea class="input w50" name="pro" cols="30" rows="5"><?php echo ($data["pro"]); ?></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="clear"></div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body></html>