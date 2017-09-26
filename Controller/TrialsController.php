<?php 
	
	class TrialsController extends AppController{
		

		function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('index');
		$this->loadModel('Trial');
		}
		
		public $components = array('RequestHandler');
		public $helpers = array('Js');

		public function index(){
		}
		public function view(){
			$this->autoRender= false;
			$data = $this->Trial->find('all',array());
			return json_encode($data);
		}
		public function add(){
		}

		public function insert(){
			$this->autoRender = false;
			if($this->request->is('post')) {
				// $data = $this->request->data;
				// pr($data);
					$postdata = array();
					$postdata = (array)$this->request->input('json_decode');
					// $userData = (array) $postdata['Users'];
					pr($postdata);
					$this->Trial->create($postdata);
				if($this->Trial->save($this->request->data)){
					echo'Yay!';
				}
			}
		}

		public function update($id){
			$trial = $this->Trial->findByid($id);
			$this->set(compact('trial'));
		}
		public function edit($id){
			$this->autoRender =false;
			if($this->request->is('post')){
					$this->Trial->id= $id;
					$postdata = array();
					$postdata = (array)$this->request->input('json_decode');
				if($this->Trial->save($postdata)){
					echo 'Na update na yay!';
					return;
				}
			}	
		}
		public function delete($id){
			$this->autoRender=false;
			$this->Trial->findByid($id);
			$this->set(compact('trial'));
			$this->Trial->id=$id;
			if($this->Trial->delete($id)){
				echo 'na delete na kuno';
				return;
			}
		}
		public function search(){
			$this->autoRender = false;
			if($this->request->is('post')){
				$postdata = array();
				$postdata = (array)$this->request->input('json_decode');
				$keyword = isset($postdata['search']) ? $postdata['search'] : '';
				$data=$this->Trial->find('all', array(
					'conditions' => array(
						'Trial.username LIKE' => $keyword.'%'
						)
					)
				);
				return json_encode($data);
			}
		}
	}		
	