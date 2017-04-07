<?php
namespace core\lib;

use core\lib\conf;
/**
 * 模型类
 * @author haoqingsong.org
 */
class model extends \PDO{
	public function __construct(){
		$datebase = conf::all('mysql');
		try{
			parent::__construct($datebase['DSN'], $datebase['NAME'], $datebase['PASSWORD']);
		}catch (\PDOException $e){
			p($e->getMessage());
		}
		
	}
}