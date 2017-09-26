<?php 
class Trial extends AppModel{
	
	public $useTable= 'users';
	
	public $validate = array(
		'username' => array(
			'required' => true,
			'rule' => 'notEmpty'
		),
	
		'password' => array(
			'required' => true,
			 'rule' => 'notEmpty'
		),
	);
 }
?>