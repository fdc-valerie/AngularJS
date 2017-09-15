<?php 
	include('classAngular.php');
	$postdata = file_get_contents("php://input");
	$data = json_decode($postdata);
	$inputs = $data->datas[0];
	$pdo = new AngularClass();
	if($pdo){
		$pdo->insertRow($inputs);
	 }
?>