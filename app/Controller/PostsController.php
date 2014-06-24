<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $uses = array('Post');

	public function stream($lastId = null) {
		$options = array();
		if(!is_null($lastId) && is_numeric($lastId)) {
			$options['lastId'] = $lastId;
		}
		$postList = $this->Post->getStream($options);
		$this->set('postList', $postList);
		$lastPost = end($postList);
		$this->set('lastId', $lastPost['Post']['id']);
	}

	public function view($id = null) {
		if(is_null($id)) {
			$this->redirect("/");
		}

		$post = $this->Post->getPost($id);
		$isFirst = $this->Post->isFirst($id);
		$isLast = $this->Post->isLast($id);

		$this->set('post', $post);
		$this->set(compact('isFirst', 'isLast'));
	}

	public function next($id = null) {
		if(is_null($id)) {
			$this->redirect("/");
		}

		$nextId = $this->Post->getNextPostId($id);

		$redirect = array(
			'action' => 'view',
			$nextId
		);
		$this->redirect($redirect);
	}

	public function prev($id = null) {
		if(is_null($id)) {
			$this->redirect("/");
		}

		$prevId = $this->Post->getPrevPostId($id);

		$redirect = array(
			'action' => 'view',
			$prevId
		);
		$this->redirect($redirect);
	}

}