<?php 

class ProductsController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','view');
		$this->loadModel('Product');
		if ($this->request->is('ajax')) {
        	$this->layout = 'ajax';
    	}
	}
  	 
	public $uses = array('Users');

	public function index(){
	
		}

	public function search(){	
		$this->layout=false;
		if ($this->request->is('post')) {
			$postData = $this->request->data;
			$keyword = isset($postData['search']) ? $postData['search'] : '';

			$conditions = $keyword ? array(
				'Product.name LIKE ' => $keyword . '%'
				) : array();

			$products = $this->paginate=array(
				'Product'=> array(
					'fields' => array(
						'Product.*'
					),
					'limit' => 10,
					'conditions' => $conditions
				)
			);
			$products = $this->paginate('Product');
			$this->set('products', $products);
		}
	}

	public function add(){
		if($this->request->is('post')){
			$this->Product->create();
			if($this->Product->save($this->request->data)){
				$message = 'Data Successfully Added!';
				  $this->Session->setFlash('<div class="alert alert-success">'.$message.'</div>');
				$this->redirect(array(
					'controller' => 'Products',
					'action' => 'index'
					)
				);
			}else{
				echo 'wa sa input sa ang mga fields';
			}
		}
	}

	public function edit($id){
		if(	$this->request->is('post')){
			$this->Product->id = $id;
			$this->Product->save($this->request->data);
				$message = 'Data Successfully Updated!';
				$this->Session->setFlash('<div class="alert alert-success">'.$message.'</div>');
				$this->redirect(array(
					'controller' => 'Products', 
						'action' => 'index'
						)
					);
		}
		$this->set('products', $this->Product->findByid($id));
	}
	public function delete($id){
			$this->autoRender = false;		
			$this->Product->id = $id;
			$this->Product->delete($id);
			$message = 'Data Successfully Deleted!';
				  $this->Session->setFlash('<div class="alert alert-success">'.$message.'</div>');
			$this->redirect(array(
				'controller' => 'Products', 
				'action' => 'index'
				)
			);
	}

	public function login(){
		  if ($this->request->is('post')) {

		   $username = $this->request->data['Users']['username'];
		   $password = $this->request->data['Users']['password'];

		   $conditions = array(
		    'Users.username' => $username,
		    'Users.password' => $password
		   );
		   
		   $data = $this->Users->find('first', array(
		    'conditions' => $conditions
		   ));
		   
		   if (isset($data['Users'])) {
		    if ($data['Users']['status'] == 0) {
		     $message = __('Your account is not activated');
		     $this->Session->setFlash('<div class="alert alert-warning">'.$message.'</div>');
		    }else if($this->Auth->login($data['Users'])) {
		     // $this->redirect(array('controller' => 'AdminSchedule', 'action' => 'index'));
		     $this->redirect($this->Auth->redirectUrl());
		    }
		   }else{
		    $message = __('Username or Password is incorrect');
		    $this->Session->setFlash('<div class="alert alert-danger">'.$message.'</div>');
   			}
 		 }
 	}

	public function logout(){
	  return $this->redirect($this->Auth->logout());
	 }
}