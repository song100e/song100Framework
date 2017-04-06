<?php
namespace core\lib;

use \core\config;
class model extends \PDO{
	public function __construct(){
		$dsn = "mysql:host=192.168.10.166;dbname=ez_cloud_cs";
		$username = "test";
		$password = "123456";
		try{
			parent::__construct($dsn, $username, $password);
		}catch (\PDOException $e){
			p($e->getMessage());
		}
		
	}
}