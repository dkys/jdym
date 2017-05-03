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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加分类</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo U('add');?>" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>分类名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="cate_name" data-validate="required:请输入分类名称" /><span style="margin:20px 0 0 50px;color: red;">提示：最多添加5个分类</span>
                    <div class="tips"></div>
                </div>
            </div>


            <div class="clear"></div>
            <!--****************************************************上级分类-->
            <div class="form-group">
                <div class="label">
                    <label>上级分类：</label>
                </div>
                <div class="field">
                    <select name="pid" id="se">
                        <!--<option value="">请选择上级分类</option>-->
                        <?php foreach($cateinfo as $v):?>
                        <?php if($v['cate_name'] == '案例'): ?><option selected="selected" value="<?php echo ($v["id"]); ?>"><?php echo ($v["cate_name"]); ?></option>
                        <?php else: ?>
                        <option disabled="disabled" value="<?php echo ($v["id"]); ?>"><?php echo ($v["cate_name"]); ?></option><?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <!--<span style="margin-left: 20px;color: #bb0000;">提示：如果添加顶级分类,不需要选择上级分类</span>-->
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group he">
                <div class="label">
                    <label>上级分类：</label>
                </div>
                <div class="field" style="display: inline-block" >
                    <select id="ses" name="pname">
                        <!--<option disabled="disabled" id="ops" value="案例">请选择上级分类</option>-->
                        <option selected="selected"  id="op" value="案例">案例</option>
                    <div class="tips"></div>
                </select>
            </div>
                </div>

            <script>
                    $(".he").hide();
//                $(function () {
//                    $("#se").change(function() {
//                        var sev = $('#se').find("option:selected").text();
//                        $("#op").siblings().remove();
//                        $("#op").after('<option selected id="ops" value="'+sev+'">'+sev+'</option>');
//                    });
//                });
                
            </script>

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