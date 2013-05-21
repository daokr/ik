<?php
return array(

	'LOAD_EXT_CONFIG' => 'db,url', //扩展配置
	'APP_AUTOLOAD_PATH' => 'Iklib,COM',//自动加载项目类库
    'TMPL_ACTION_SUCCESS' => 'public:success',
    'TMPL_ACTION_ERROR'   => 'public:error',

	'SHOW_PAGE_TRACE' => false,
	
	//'SESSION_PREFIX'=>'ik',
	'COOKIE_PREFIX'=>'ik_',

	'APP_DEBUG'=>true,
	'DB_FIELD_CACHE'=>false,
	'HTML_CACHE_ON'=>false,
);
?>