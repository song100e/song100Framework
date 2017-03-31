<?php
/**
 * 入口文件
 * 定义常量、关键路径、debug模式
 */	
define('QINGSONG', realpath('./'));
define('CORE', QINGSONG.'/core');
define('APP', QINGSONG.'/app');
define('MODULE','app');
define('DEBUG', true);
if(DEBUG){
	ini_set('display_error', 'On');		
}else{
	ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';
include CORE.'/qingsong.php';
spl_autoload_register('\core\qingsong::load');
\core\qingsong::run();
?>