<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

	public $uses = array('Post');

	public function add() {
		if(!empty($this->request->data)) {
			$data = $this->request->data;
			$this->Post->addPost($data);
		}
	}

	public function index() {
		$postList = $this->Post->getStream(array('limit' => -1, 'trim' => 20));
		$this->set('postList', $postList);
	}

	public function edit($id = null) {
		if(is_null($id) && empty($this->request->data)) {
			$this->redirect(array('action' => 'index'));
		}

		if(!empty($this->request->data)) {
			$data = $this->request->data;
			$data['Post']['modified'] = date("Y-m-d H:i:s", time());
			$this->Post->save($data);
			$this->redirect(array('action' => 'index'));
		}

		$post = $this->Post->find('first', array(
			'conditions' => array(
				'id' => $id
			)
		));
		$this->request->data = $post;
	}

	public function delete($id = null) {
		if(is_null($id)) {
			$this->redirect("/");
		}

		$this->Post->delete($id);

		$this->redirect(array('action' => 'index'));
	}
}