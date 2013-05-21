<?php
/*
 * 爱客网单入口
* @copyright (c) 2012-3000 IKPHP All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/
define ( 'IN_IK', true );
//载入版本号
require_once('version.php');
if (!is_file('./data/install.lock')) {
	header('Location: ./install.php');
	exit;
}

//网站根路径设置
define('SITE_PATH', dirname(__FILE__));

/* 应用名称*/
define('APPS_NAME', 'apps');
/* 应用目录*/
define('APPS_PATH', './apps/');
define('APPS_URL', 'apps/');
/* 公共扩展目录*/
define('IK_EXTEND_PATH', './extend/');
/* 数据目录*/
define('IK_DATA_PATH', './data/');
/* 配置文件目录*/
define('CONF_PATH', IK_DATA_PATH . 'config/');
/* 数据目录*/
define('RUNTIME_PATH', IK_DATA_PATH . 'runtime/');
/* DEBUG开关*/
define('APP_DEBUG', true); //调试时候打开 部署时候关闭

//载入核心文件
require("./core/core.php");
