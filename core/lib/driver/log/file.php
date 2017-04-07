<?php
namespace core\lib\driver\log;

use core\lib\conf;
class file {
	
	public $path; // 日志存储路径
	public function __construct(){//__construct要写对
		$conf = conf::get('OPTION', 'log');
		$this->path = $conf['PATH'];
	}
	
	/**
	 * 
	 * @param string $message
	 * @param string $file 存储文件名
	 * @return mixed
	 */
	public function log($message, $file = 'log'){
		/*
		 * 1， 目录是否存在， 不存在则创建
		 * 2，写入日志
		 */
		if(!is_dir($this->path)){
			mkdir($this->path, '0777', true);
		}
		$target  = $this->path .date('Ymd'). $file;// 按日进行切分
		$message = date('Y-m-d H:i:s'). json_encode($message).PHP_EOL; 	// PHP_EOL：换行符
		return file_put_contents($target, $message, FILE_APPEND);	// FILE_APPEND 追加模式
	}
}