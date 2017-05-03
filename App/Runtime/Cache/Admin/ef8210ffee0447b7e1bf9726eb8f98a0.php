<?php if (!defined('THINK_PATH')) exit();?>  <!DOCTYPE html>
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

  <link rel="stylesheet" href="/jdzx/Public/kindeditor/themes/default/default.css" />
  <link rel="stylesheet" href="/jdzx/Public/kindeditor/plugins/code/prettify.css" />
  <script charset="utf-8" src="/jdzx/Public/kindeditor/kindeditor.js"></script>
  <script charset="utf-8" src="/jdzx/Public/kindeditor/lang/zh_CN.js"></script>
  <script charset="utf-8" src="/jdzx/Public/kindeditor/plugins/code/prettify.js"></script>
  <script>
    KindEditor.ready(function(K) {
      var editor1 = K.create('#editor_id', {
        cssPath : '/jdzx/Public/kindeditor/plugins/code/prettify.css',
        uploadJson : "<?php echo U('Article/uploadJson');?>",
        fileManagerJson : "<?php echo U('Article/fileManagerJson');?>",
        allowFileManager : true,
        afterCreate : function() {
          var self = this;
          K.ctrl(document, 13, function() {
            self.sync();
            K('form[name=form-subtitle]')[0].submit();
          });
          K.ctrl(self.edit.doc, 13, function() {
            self.sync();
            K('form[name=form-subtitle]')[0].submit();
          });
        }
      });
      prettyPrint();
    });
  </script>

</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>新增项目</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('add');?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>项目名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入案例名称" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>英文名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="entitle" data-validate="required:请输入简介" />
          <div class="tips"></div>
        </div>
      </div>
    <div class="form-group">
    <div class="label">
        <label>选择分类：</label>
    </div>
    <div class="field">
        <select name="pid">
            <option value="1">签证</option>
            <option value="2">移民</option>
        </select>
    <div class="tips"></div>
    </div>
    </div>
      <div class="form-group">
        <div class="label">
          <label>封面图片：</label>
        </div>
        <div class="field">
          <input type="file" name="logo" />
         
          <div class="tips"></div>
        </div>
      </div>

<!--      <div class="form-group">
        <div class="label">
          <label>分类：</label>
        </div>
        <div class="field">
          <select name="fenlei_id">
            <option value="">请选择</option>
            <?php foreach($fenleiInfo as $v):?>
            <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["cate_name"]); ?></option>
            <?php endforeach; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>-->
<!--      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea id="editor_id" name="content" cols="60" rows="10"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>-->



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
<script >
  UM.getEditor('content',{
    initialFrameWidth : "100%"
  });
</script>