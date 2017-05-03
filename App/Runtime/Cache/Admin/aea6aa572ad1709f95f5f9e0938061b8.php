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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>

      <th width="15%">操作</th>
    </tr>
    <?php foreach($info as $v):?>
    <tr imgId="<?php echo ($v["id"]); ?>" >
      <td><?php echo ($v["id"]); ?></td>
      <td><img src="/jdzx/Public/Uploads/<?php echo ($v["logo"]); ?>" alt="" width="120" height="50" /></td>

      <td><div class="button-group">

        <a class="button border-red" href="javascript:void(0)" onclick="delImg(this)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<script type="text/javascript">
  function updateAdvData(imgId){
    $.ajax({
      type:"GET",
      url:"<?php echo U('ajaxDelAdvData','',false);?>/imgId/"+imgId
    });
  }
  function delImg(a)
  {
    if(confirm('确定要删除吗？')){
      //执行ajax   找到所在的tr标签
      var tr=$(a).parent().parent().parent();
      //console.log(tr);
      var imgId=tr.attr('imgId');
      updateAdvData(imgId);
      //把这个tr标签从羽绒棉中删除
      tr.remove();

    }
  }

</script>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Adv/adv');?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

        <div class="form-group">
        <div class="label">
          <label>链接页面：</label>
        </div>
        <div class="field">
          <select name="cate_name">
            <option value="">请选择图片跳转页面</option>
            <?php foreach($cateInfo as $v):?>
            <option value="<?php echo ($v["cate_name"]); ?>"><?php echo ($v["cate_name"]); ?></option>
            <?php endforeach; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
        
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div>
          <input type="file" name="logo" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" id="btn" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>