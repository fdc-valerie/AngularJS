<?php 

class Product extends AppModel{

	public $validate = array(
		'name' => array(
			'required' => true,
			'rule' => 'notEmpty'
		),
		'description' => array(
			'required' => true,
			'rule' => 'notEmpty'
		)
	);

}


 ?>