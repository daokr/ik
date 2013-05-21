<?php
// 行为插件
return array(
	//系统语言包
    'app_begin' => array(
        'load_lang', //语言
    ),
	//路径替换
    'view_filter' => array(
        'content_replace', 
    ),


);