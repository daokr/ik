<?php

defined('THINK_PATH') or exit();
/**
 * 行为扩展：模板内容输出替换
 */
class content_replaceBehavior extends Behavior {

    public function run(&$content){
        $content = $this->_replace($content);
    }

    private function _replace($content) {
        $replace = array();
        //公用静态文件地址
        $replace['__STATIC__'] = __ROOT__.'/extend';
        //网站地址 带 / 如：http://www.ikphp.com/
        $replace['__SITE_URL__'] = C('ik_site_url');
        //网站应用风格路径
        $replace['__STATIC_CSS__'] = __ROOT__.'/'.APPS_URL.APP_NAME.'/Static/css';
        //网站应用风格图片路径
        $replace['__STATIC_IMG__'] = __ROOT__.'/'.APPS_URL.APP_NAME.'/Static/images';
        //网站应用风格图片路径
        $replace['__STATIC_JS__'] = __ROOT__.'/'.APPS_URL.APP_NAME.'/Static/js';        
        //网站基本风格
        $basecss = 'extend/theme/'.C('ik_site_theme').'/base.css';
        //APP风格默认样式
        $appcss = APPS_URL.APP_NAME.'/Static/css/style.css';

        if(is_file($basecss)){  
        	$sitecss = '@import url('.C('ik_site_url').$basecss.');';
        }
        if(is_file($appcss)){
        	$sitecss .= '@import url('.C('ik_site_url').$appcss.');';
        }
        //开始替换css
        $replace['__SITE_THEME_CSS__'] = $sitecss;
        //扩展js
        $appextendjs = APPS_URL.APP_NAME.'/Static/js/extend.func.js';
        
        if(is_file($appextendjs)){
        	$replace['__EXTENDS_JS__'] = '<script src="'.C('ik_site_url').$appextendjs.'" type="text/javascript"></script>';
        }else{
        	$replace['__EXTENDS_JS__'] = '';
        }
        
        $content = str_replace(array_keys($replace),array_values($replace),$content);
        return $content;
    }
}