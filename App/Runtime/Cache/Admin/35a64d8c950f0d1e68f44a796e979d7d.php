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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/jdzx/index.php/Admin/Product/edit/id/1 " enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
      <div class="form-group">
        <div class="label">
          <label>导航名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($data["navtitle"]); ?>" name="navtitle" data-validate="required:请输入导航名称" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>英文名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($data["naventitle"]); ?>" name="naventitle" data-validate="required:请输入英文名称" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
            <input type="text" class="input w50" value="<?php echo ($data["sort"]); ?>" name="sort" style="margin-right: 20px;"/>
          <div class="tips"><p style="margin:10px 0 0 0;color: red; ">提示：排序值越小越靠前</p></div>
        </div>
      </div>
<!--
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" value="<?php echo ($data["logo"]); ?>" name="logo" />
          <div class="tips"></div>
        </div>
      </div>-->

      <div class="form-group">
        <div class="label">
          <label>项目：</label>
        </div>
        <div class="field">
          <select name="fenlei_id">
            <option value="">请选择</option>
            <?php foreach($fenleiInfo as $v): if($data['fenlei_id'] == $v['id']) $select = "selected='selected'"; else $select = ''; ?>
            <option <?php echo $select;?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option>
            <?php endforeach; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea id="editor_id" name="content" cols="60" rows="10"><?php echo ($data["content"]); ?></textarea>
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
<script >
  UM.getEditor('content',{
    initialFrameWidth : "100%"
  });
</script>