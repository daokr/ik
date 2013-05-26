<?php
function ikreurl() {
	
	$options = fileRead ( CONF_PATH . 'url.php' );
	$scriptName = explode ( 'index.php', $_SERVER ['SCRIPT_NAME'] );
	$rurl = substr ( $_SERVER ['REQUEST_URI'], strlen ( $scriptName [0] ) );
	if (preg_match ( '/index.php/i', $rurl )) {
		$rurl = str_replace ( 'index.php', '', $rurl );
		$rurl = substr ( $rurl, 1 );
		$params = $rurl;
	} else {
		$params = $rurl;
	}
	//开始匹配
	if ($rurl) {
		if ($options ['URL_MODEL'] == 0) {
			
		}
		if ($options ['URL_MODEL'] == 1) {
			if(strpos($params,'?')==false){
				$params = explode('/', $params);
			}else{
				// public/user/check/t/username?username=uname
				$arrurl = explode ( '?', $params );
				$params = explode('/', $arrurl[0]);
			}
			foreach ( $params as $p => $v ) {
				//url解析
				switch ($p) {
					case 0 :
						$_GET ['app'] = $v; //应用名称
						break;
					case 1 :
						$_GET ['m'] = $v; //module 名称
						if (empty ( $_GET ['m'] )) {
							$_GET ['m'] = 'index';
						}
						break;
					case 2 :
						$_GET ['a'] = $v; //action 名称
						if (empty ( $_GET ['a'] )) {
							$_GET ['a'] = 'index';
						}
						break;
				}
			}

		}
	}
			//get
			//var_dump($_GET);die;
}
/*读取文件
 @$dfile 文件
*/
function fileRead($dfile) {
	if (is_file ( $dfile )) {
		$data = include $dfile;
		return $data;
	}
}