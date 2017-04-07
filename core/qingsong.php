<?php
namespace core;

/**
* 框架核心类
*/
class qingsong
{
	public $assign;
	public static $classMap = array();
	function __construct()
	{
		# code...
	}

	public static function run(){
		\core\lib\log::init();
		//\core\lib\log::log($_SERVER);
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
			\core\lib\log::log('Ctrl:'.$ctrlClass.'         Action:'.$action);
		}else{
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
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
	
	/**
	 * 视图传值
	 * @param string $name
	 * @param string $value
	 */
	public function assign($name, $value){
		$this->assign[$name] = $value;
	}
	
	/**
	 * 解析视图变量
	 * @param string $file
	 */
	public function display($file){
		$file = APP.'/views/'.$file;
		if(is_file($file)){
			extract($this->assign);
			include $file;
		}
	}
}