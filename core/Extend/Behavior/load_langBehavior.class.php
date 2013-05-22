<?php

defined('THINK_PATH') or exit();

class load_langBehavior extends Behavior {
    protected $options   =  array(
        'DEFAULT_LANG' => 'zh-cn', // 当前语言包
    );

    public function run(&$params){
        $lang = $group_lang = $module_lang = array();
        $lang_dir = LANG_PATH . C('DEFAULT_LANG');

        // 读取项目公共语言包
        if (is_file($lang_dir . '/common.php')) {
            $lang = include $lang_dir . '/common.php';
        }
        // 读取当前模块语言包
        $module_lang_file = $lang_dir . '/' . MODULE_NAME . '.php';
        if (is_file($module_lang_file)) {
        	$module_lang = include $module_lang_file;
        }
        $lang = array_merge($lang, $module_lang);
        
        L($lang);
    }
}