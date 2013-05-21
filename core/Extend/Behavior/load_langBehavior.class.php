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
        $lang = array_merge($lang, $group_lang, $module_lang);
        
        L($lang);
    }
}