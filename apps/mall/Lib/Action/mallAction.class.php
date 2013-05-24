<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class mallAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制
		if (! $this->visitor->is_login && in_array ( ACTION_NAME, array (
				'create',
		) )) {
			$this->redirect ( 'user/login' );
		} else {
			$this->userid = $this->visitor->info ['userid'];
		}
		$this->user_mod = D ( 'user' );
		//生成导航
		$this->assign('arrNav',$this->_nav());
	}
	protected  function _nav(){
		// 导航
		if($this->visitor->info['userid']){
			$arrNav['index'] = array('name'=>'我的淘客', 'url'=>U('mall/index/mine'));
		}
		$arrNav['explore'] = array('name'=>'发现宝贝', 'url'=>U('mall/index/explore_goods'));
		$arrNav['album'] = array('name'=>'发现专辑', 'url'=>U('mall/index/explore_album'));
		$arrNav['share'] = array('name'=>'我要分享', 'url'=>U('mall/index/share'));
		return $arrNav;
	}
	public function share() {
	
		$this->_config_seo (array('title'=>'我要分享','subtitle'=>'淘客'));
		$this->display();
	}
	public function index() {
		
		$this->display('mine');
	}		
	public function mine() {
		
		$this->_config_seo (array('title'=>'小猫女的淘客','subtitle'=>'淘客'));
		$this->display();
	}
	
	public function explore_goods() {
	
	
		$this->_config_seo (array('title'=>'发现宝贝','subtitle'=>'淘客'));
		$this->display();
	}	
	public function explore_album() {
	
		
		$this->_config_seo (array('title'=>'发现专辑','subtitle'=>'淘客'));
		$this->display();
	}
	
	public function album() {
	
	
		$this->_config_seo (array('title'=>'发现专辑','subtitle'=>'淘客'));
		$this->display('explore_album');
	}
	//创建专辑
	public function create_album(){
		
		$this->_config_seo (array('title'=>'创建新专辑','subtitle'=>'淘客'));
		$this->display();
	}	
	
}