<?php 

class Login extends AppModel{
	


	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Username is required'
				)
			),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Password is required'
				)
			)

		);
	public $useTable = 'users';
}
?>

