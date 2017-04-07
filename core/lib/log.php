<?php
namespace core\lib;

use core\lib\conf;
/**
 * 日志记录类
 * @author haoqingsong.org
 */
class log{
	
	public static $class;
	/**
	 * 1，确定日志存储方式
	 * 2，写日志
	 */
	public static function init(){
		$driver = conf::get('DRIVER', 'log');
		$class  = '\core\lib\driver\log\\'.$driver;
		self::$class = new $class;
	}
	
	/**
	 * 记录日志
	 */
	public static function log($name){
		self::$class->log($name);
	}
}