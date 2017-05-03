<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/jadingzx/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/jadingzx/Public/Admin/css/admin.css">
    <script src="/jadingzx/Public/Admin/js/jquery.js"></script>
    <script src="/jadingzx/Public/Admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo U('edit');?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            <div class="form-group">
                <div class="label">
                    <label>分类名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($data["cate_name"]); ?>" name="cate_name" data-validate="required:请输入标题" />
                    <div class="tips"></div>
                </div>
				<br /><br /><br />

                <div class="form-group">
                    <div class="label">
                        <label>上级分类：</label>
                    </div>
                    <div class="field">
                        <select name="pid" id="se">
                            <option value="">请选择上级分类</option>
                            <?php foreach($list as $v):?>

                            <?php if($v['id'] == $data['pid']): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["cate_name"]); ?></option><?php endif; ?>
                            <option value="<?php echo ($v["cate_name"]); ?>"><?php echo ($v["cate_name"]); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!--<span style="margin-left: 20px;color: #bb0000;">提示：如果添加顶级分类,不需要选择上级分类</span>-->
                        <div class="tips"></div>
                    </div>
                </div>

                <div class="label">
                    <label>排序：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($data["sort"]); ?>" name="sort"  />
                    <div class="tips"></div>
                    <span style="margin-left: 20px;color: #bb0000;">提示：排序数字最小显示最上面。</span>
                </div>

                <div class="form-group he">
                    <div class="label">
                        <label>上级分类：</label>
                    </div>
                    <div class="field">
                        <select id="ses" name="pname">
                            <option id="op" value="">请选择上级分类</option>
                        </select>
                        <!--<span style="margin-left: 20px;color: #bb0000;">提示：如果添加顶级分类,不需要选择上级分类</span>-->
                        <div class="tips"></div>
                    </div>
                </div>
                <script>
                    $(function () {
                        $(".he").hide();
                        $("#se").change(function() {
                            var sev = $('#se').find("option:selected").text();
                            $("#op").siblings().remove();
                            $("#op").after('<option selected id="ops" value="'+sev+'">'+sev+'</option>');
                        });
                    });

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