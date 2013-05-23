<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="160780470@qq.com" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title><?php echo ($title); ?> - <?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__ROOT__/apps/admin/Static/css/style.css" />
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>
<script src="__ROOT__/apps/admin/Static/js/common.js" type="text/javascript"></script>
</head>
<body>
<!--main-->
<div class="midder">
<h2><?php echo ($title); ?></h2> 

<form method="POST" action="<?php echo U('admin/apps/saveapp');?>">
<table cellpadding="0" cellspacing="0">
	<tr>
		<th>应用名称：</th>
		<td><?php echo ($strApp[app_name]); ?></td>
	</tr>
	<tr>
		<th>应用别名：</th>
		<td><input style="width: 300px;" name="app_alias" value="<?php echo ($strApp[app_alias]); ?>" maxlength="50"/> 前台展示的应用名称（必填）</td>
	</tr>
	<tr>
		<th>应用描述：</th>
		<td><textarea style="width: 300px; height: 50px; font-size: 12px;" name="description" maxlength="200"><?php echo ($strApp[description]); ?></textarea>
        用于前台展示本应用的描述</td>
	</tr>

	<tr>
		<th>应用状态：</th>
		<td>
        <input type="radio"  <?php if($strApp[status] == 1): ?>checked<?php endif; ?> name="status" value="1" /> 开启 
        <input type="radio"  <?php if($strApp[status] == 0): ?>checked<?php endif; ?> name="status" value="0" /> 关闭 
        </td>
	</tr>

	<tr>
		<th>开发者：</th>
		<td><input style="width: 300px;" name="author_name" value="<?php echo ($strApp[author_name]); ?>" maxlength="30"/></td>
	</tr>
	<tr>
		<th>开发者网址：</th>
		<td><input style="width: 300px;" name="author_url" value="<?php echo ($strApp[author_url]); ?>" maxlength="100"/> 必须以http://开头，以/结尾</td>
	</tr>
	<tr>
		<th>版本：</th>
		<td><input style="width: 300px;" name="version" value="<?php echo ($strApp[version]); ?>" maxlength="30"/></td>
	</tr>
    
</table>
<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>

</div>
</body>
</html>