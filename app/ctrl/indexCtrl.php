<?php
namespace app\ctrl;
class indexCtrl extends \core\qingsong {
	public function index(){
		$data  = 'Hello QingSong';
		$model = new \core\lib\model;
		$sql = 'select id,name from test';
		$res = $model->query($sql);
		//p($res->fetchAll());
		
		$this->assign('data', $data);
		$this->display('index.html');
	}
}