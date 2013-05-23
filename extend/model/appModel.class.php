<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
* @应用APP模型
*/
class appModel extends Model {
	public static $defaultApp = array (); // 默认应用字段
	public $_host_type = array (); // 应用类型字段
	/**
	 * 初始化 - 用于双语处理
	 *
	 * @return void
	 */
	public function _initialize() {
		$this->_host_type = array (
				0 => "本地应用",
				1 => "远程应用"
		); // 本地应用，远程应用
	}
	/**
	 * 获取未安装应用列表
	 * @return array 未安装应用列表
	 */
	public function getUninstallList() {
		$uninstalled = $arrapp = array ();
		
		// 已经安装的
		$installed = $this->field ( 'app_name' )->order ( 'app_id DESC' )->select();
		// 默认应用，不能安装卸载
		if(!empty($installed)){
			foreach($installed as $key=>$item){
				$arrapp[$key] = $item['app_name'];
			}
			$installed = array_merge ( $arrapp, C ( 'DEFAULT_APPS' ) ); 
		}else{
			$installed = C ( 'DEFAULT_APPS' );
		}
		
		$dirs = new Dir ( APPS_PATH );
		$dirs = $dirs->toArray (); //转换成数组
		foreach ( $dirs as $v ) {
			if ($v ['isDir'] && ! in_array ( $v['filename'], $installed )) {
				if ($info = $this->__getAppInfo ( $v['filename'] )) { 
					$uninstalled [] = $info;
				}
			}
		}
		return $uninstalled;
	}
	/**
	 * 获取应用信息
	 *
	 * @param string $path_name   	应用路径名称
	 * @param boolean $using_lowercase    返回键值为大写还是小写，默认为小写
	 * @return array 指定应用的相关信息
	 */
	public function __getAppInfo($path_name, $using_lowercase = true) {
		$filename = APPS_PATH . '/' . $path_name . '/Appinfo/about.php';
	
		if (is_file ( $filename )) {
			$info = include_once $filename;
				
			$info ['HOST_TYPE_ALIAS'] = $this->_host_type [$info ['HOST_TYPE']];
			$info ['APP_ALIAS'] = $info ['NAME']; //应用别名
			$info ['PATH_NAME'] = $path_name;
			$info ['APP_NAME'] = $path_name;
			return $using_lowercase ? array_change_key_case ( $info ) : array_change_key_case ( $info, CASE_UPPER );
		} else {
			return false;
		}
	}	
}