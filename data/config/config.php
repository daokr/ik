<?php
return array(

	'LOAD_EXT_CONFIG' => 'db,url', //扩展配置    
	'TMPL_ACTION_SUCCESS' => 'public:success',
    'TMPL_ACTION_ERROR'   => 'public:error',
	'APP_AUTOLOAD_PATH' => 'classlib.iklib,classlib.com',//自动加载项目类库		
	'SHOW_PAGE_TRACE' => false,
	
	//'SESSION_PREFIX'=>'ik',
	'COOKIE_PREFIX'=>'ik_',

	'APP_DEBUG'=>true,
	'DB_FIELD_CACHE'=>false,
	'HTML_CACHE_ON'=>false,

	//'SHOW_RUN_TIME'    => true, // 运行时间显示
	//'SHOW_ADV_TIME'    => true, // 显示详细的运行时间
);
?>