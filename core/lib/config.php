<?php
namespace core\lib;

class conf {
	
	static public $conf = array();
	/**
	 * 1,判断配置文件是否存在
	 * 2,判断配置个项是否存在
	 * 3,缓存配置个项
	 * @param string $name
	 * @param string $file
	 */
	public static function get($name, $file){
		$file = CORE.'/config/'.$file.'.php';
		p($file);exit;
		if(is_file($file)){
			$conf = include $file;
			if(isset($conf[$name])){
				self::$conf[$name] = $conf[$name];
				return $conf[$name];
			}else{
				throw new \Exception('木有找到配置项'.$name);
			}
		}else{
			throw new \Exception('木有找到配置文件'.$file);
		}
	}
}