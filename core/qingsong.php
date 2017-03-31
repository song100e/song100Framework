<?php
namespace core;

/**
* 
*/
class qingsong
{
	public static $classMap = array();
	function __construct()
	{
		# code...
	}

	public static function run(){
		//p('ok');
		$route = new \core\lib\route();
		var_dump($route);
	}
	
	public static function load($class){
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = QINGSONG.'/'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}
}