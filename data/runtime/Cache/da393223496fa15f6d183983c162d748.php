<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="160780470@qq.com" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title><?php echo ($title); ?> - <?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__ROOT__/apps/<?php echo ($app_name); ?>/Static/css/style.css" />
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>
<script src="__ROOT__/apps/<?php echo ($app_name); ?>/Static/js/common.js" type="text/javascript"></script>
</head>
<body>
<!--main-->
<div class="midder">
<h2><?php echo ($title); ?></h2> 
<table  cellpadding="0" cellspacing="0">
<tr class="old">
<td>ID</td>
<td>缓存名称</td>
<td>描述</td>
<td width="200">操作</td>
</tr>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><tr class="odd">
<td><?php echo ($item[id]); ?></td>
<td><?php echo ($item[name]); ?></td>
<td style="color:#999"><?php echo ($item[desc]); ?></td>
<td>
<a href="<?php echo U('cache/delete',array('id'=>$item[id]));?>">[清除]</a>
</td>
<tr><?php endforeach; endif; ?>
</table>


</div>
</body>
</html>