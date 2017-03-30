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
		p('ok');
	}
	
	public static function load($class){
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = QINGSONG.'/'.$calss.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}
}