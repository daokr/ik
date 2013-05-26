<?php
/*
 * 爱客网核心自动安装文件
* @copyright (c) 2012-3000 IKPHP All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/
//记录开始运行时间
$GLOBALS['_beginTime'] = microtime(TRUE); 
// 记录内存初始使用
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();

//设置全局变量$ik
$ik['_debug']	=	true;		//调试模式
$ik['_define']	=	array();	//全局常量
$ik['_config']	=	array();	//全局配置
$ik['_access']	=	array();	//访问配置
$ik['_router']	=	array();	//路由配置

//参数处理 If already slashed, strip.
if (get_magic_quotes_gpc()) {
	$_GET    = stripslashes_deep( $_GET    );
	$_POST   = stripslashes_deep( $_POST   );
	$_COOKIE = stripslashes_deep( $_COOKIE );
}

//参数处理 控制不合规格的参数
check_gpc($_GET);
check_gpc($_POST);
//check_gpc($_COOKIE);

//ikphp专用处理url路由
ikreurl ();

//解析关键参数 todo:参数过滤 preg_match("/^([a-zA-Z_\/0-9]+)$/i", $ik, $url);
$_REQUEST	=	array_merge($_GET,$_POST);
if(isset($_REQUEST['os']) && !isset($_REQUEST['app'])){
	$ik['_os']  = $_REQUEST['os'];
}else{
	$ik['_app'] =  isset($_REQUEST['app']) && !empty($_REQUEST['app'])?$_REQUEST['app']:'public';
	$ik['_mod'] =  isset($_REQUEST['m']) && !empty($_REQUEST['m'])?$_REQUEST['m']:'index';
	$ik['_act'] =  isset($_REQUEST['a']) && !empty($_REQUEST['a'])?$_REQUEST['a']:'index';
}

$ik['_widget_appname'] = isset($_REQUEST['widget_appname']) && !empty($_REQUEST['widget_appname'])  ? $_REQUEST['widget_appname'] :'';
//APP的常量定义
define('APP_NAME'		, $ik['_app']);
define('TRUE_APPNAME',!empty($ik['_widget_appname']) ? $ik['_widget_appname']:APP_NAME);
define('MODULE_NAME'	, $ik['_mod']);
define('ACTION_NAME'	, $ik['_act']);

define('APP_PATH'			, APPS_PATH.TRUE_APPNAME.'/');
defined('LIB_PATH')     or define('LIB_PATH',       APP_PATH.'Lib/'); // 项目类库目录

//新增一些CODE常量.用于简化判断操作
define('MODULE_CODE'	, $ik['_app'].'/'.$ik['_mod']);
define('ACTION_CODE'	, $ik['_app'].'/'.$ik['_mod'].'/'.$ik['_act']);
define('APP_RUN_PATH'	, RUNTIME_PATH.'~'.TRUE_APPNAME);

//默认风格包名称
define('IK_THEME_NAME' , 'blue');
//默认静态文件、模版文件目录
define('PUBLICK_TPL_PATH'		, IK_EXTEND_PATH.'public/html');

if(!APP_DEBUG && is_file(RUNTIME_FILE)) { 
    // 部署模式直接载入运行缓存
    require RUNTIME_FILE;
}else{
    // 系统目录定义
    defined('THINK_PATH') or define('THINK_PATH', dirname(__FILE__).'/');
    // 加载运行时文件
    require THINK_PATH.'Common/runtime.php';
}

function stripslashes_deep($value) {
	if ( is_array($value) ) {
		$value = array_map('stripslashes_deep', $value);
	} elseif ( is_object($value) ) {
		$vars = get_object_vars( $value );
		foreach ($vars as $key=>$data) {
			$value->{$key} = stripslashes_deep( $data );
		}
	} else {
		$value = stripslashes($value);
	}
	return $value;
}
/**
 * GPC参数过滤
 * @param array|string $value The array or string to be striped.
 * @return array|string Stripped array (or string in the callback).
 */
function check_gpc($value=array()) {
	if(!is_array($value)) return;
	foreach ($value as $key=>$data) {
		//对get、post的key值做限制,只允许数字、字母、及部分符号_-[]#@~
		if(!preg_match('/^[a-zA-z0-9,_\-#!@~\[\]]+$/i',$key)){
			die('wrong_parameter: not safe get/post/cookie key.');
		}
		
		//如果key值为app\mod\act,value只允许数字、字母下划线
		if( ($key=='app' || $key=='m' || $key=='a') && !empty($data) ){
			if(!preg_match('/^[a-zA-z0-9_]+$/i',$data)){
				die('wrong_parameter: not safe app/mod/act value.');				
			}
		}
	}
}