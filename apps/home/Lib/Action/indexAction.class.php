<?php
// 本类由系统自动生成，仅供测试用途
class indexAction extends frontendAction {
    public function index(){
		$str = D('user')->getOneUser(2);
		$this->assign('user',$str);
    	$this->display();
    }
    public function user(){
    	
    	$this->display();
    }
}