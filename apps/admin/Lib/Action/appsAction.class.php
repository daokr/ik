<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class appsAction extends backendAction {
	
	private $appStatus = array('0'=>'关闭','1'=>'开启');	//应用状态
	private $host_type_alias = array(0=>'本地应用',1=>'远程应用');	//托管状态
	
	public function _initialize() {
		parent::_initialize ();
		
		$this->app_mod = D ( 'app' );
	}
	// 未安装的应用
	public function uninstall(){
		
		$appList = $this->app_mod->getUninstallList(); 
		foreach($appList as &$v){
			$v['host_type_alias'] = $this->host_type_alias[$v['host_type']];
			!empty($v['author_url']) && $v['author_name'] = "<a href='{$v['author_url']}'>{$v['author_name']}</a>";  
			$v['icon_url'] = empty($v['icon_url']) ? '<img src="'.APPS_URL.'/'.$v['app_name'].'/Appinfo/icon_app.png" >' : "<img src='{$v['icon_url']}'>";
			$v['doaction'] =  "<a href='".U('admin/apps/preinstall',array('app_name'=>$v['app_name'],'install'=>1))."'>安装</a>";				
		}
		$this->assign('list',$appList);
		
		$this->title ( '单页管理' );
		$this->display();
	}
	// 已经安装的应用
	public function installed(){
		$appList = $this->app_mod->select();
		dump($appList);
	}
	// 预安装
	public function preinstall(){
		$install = $this->_get('install','trim,intval');
		$app_name = $this->_get('app_name','trim');
		!$app_name && $this->error("无法安装此应用"); 
		
		if(!empty($install)){
			$strApp = $this->app_mod->__getAppInfo($app_name);
			$strApp['status'] = 1;
			$strApp['display_order'] = 0;
		}else{
			
		}
		$this->assign('strApp',$strApp);
		$this->display();
	}
	//保存
	public function saveapp(){
		if(empty($_POST['app_name']) || empty($_POST['app_alias']) || empty($_POST['app_entry'])){
			$this->error('安装失败，必填项不能为空');
		}
		if(IS_POST){
			$status = $this->app_mod->saveApp($_POST);
			if($status === true){
			
			}else{
				$this->error($status);
			}
		}
	}
	
	
	
}