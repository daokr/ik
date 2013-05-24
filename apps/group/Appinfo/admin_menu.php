<?php
/**
 * 小组后台左侧菜单信息
* @author 小麦 <160780470@qq.com>
* @version IKPHP 1.5
*/
if(!defined('SITE_PATH')) exit();

return array(
	'menu'=>array('title'=>'小组管理',
				  'submenu'=>array('name'=>'小组配置','url'=>U('group/admin/setting')),
				  'submenu'=>array('name'=>'批量管理','url'=>U('group/admin/manage')),
			),
);