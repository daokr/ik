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
<div class="tabnav">
<ul>
<?php if(is_array($menu)): foreach($menu as $key=>$item): if($key == $ik): ?><li class="select"><a href="<?php echo ($item[url]); ?>"><?php echo ($item[text]); ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo ($item[url]); ?>"><?php echo ($item[text]); ?></a></li><?php endif; endforeach; endif; ?>
</ul>
</div>
<form method="POST" action="<?php echo U('admin/tag/manage',array('ik'=>'addtag'));?>">
<table cellpadding="0" cellspacing="0">

		<th>Tag名称：</th>
		<td><textarea cols="37" rows="8" name="tags"></textarea> (一行一个Tag，多个元素用"回车"格开。)</td>
</td>
	</tr>    
</table>
<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>
</div>
</body>
</html>