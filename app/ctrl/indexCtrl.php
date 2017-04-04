<?php
namespace app\ctrl;
class indexCtrl {
	public function index(){
		//p('it is index');
		$model = new \core\lib\model;
		$sql = 'select id,name from test';
		$res = $model->query($sql);
		p($res->fetchAll());
	}
}