<?php
namespace core\lib;

use core\lib\conf;
/**
 * 路由类
 * @author haoqingsong.org
 */
class route {
	
	public $ctrl;
	public $action;
	public function __construct(){
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
			// index/index
			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/',trim($path, '/'));
			if(isset($patharr[0])){
				$this->ctrl = $patharr[0];
			}
			unset($patharr[0]);
			if(isset($patharr[1])){
				$this->action = $patharr[1];
				unset($patharr[1]);
			}else{
				$this->action = conf::get('ACTION', 'route');
			}
			
			// url多余部分转化成 GET 参数
			// id/1/str/2/test/3/qing
			$count = count($patharr) + 2;
			$i = 2;
			while($i < $count){
				if(isset($patharr[$i + 1])){
					$_GET[$patharr[$i]] = $patharr[$i + 1];
				}
				$i += 2;
			}
		}else{
			$this->ctrl = conf::get('CTRL', 'route');
			$this->action = conf::get('ACTION', 'route');
		}
	}
}