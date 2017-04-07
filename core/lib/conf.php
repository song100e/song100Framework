<?php
namespace core\lib;

/**
 * 配置类
 * @author haoqingsong.org
 */
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
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$path = QINGSONG .'/core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception('木有找到配置项'.$name);
				}
			}else{
				throw new \Exception('木有找到配置文件'.$file);
			}
		}	
	}

	/**
	 * 获取配置文件的全部配置变量
	 * @param  [string] $file [文件名]
	 * @return [array]
	 */
	public static function all($file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$path = QINGSONG .'/core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception('木有找到配置文件'.$file);
			}
		}
	}
}