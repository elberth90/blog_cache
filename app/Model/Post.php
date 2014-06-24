<?php

App::uses('Sanitize', 'Utility');

class Post extends AppModel {
	

	public function getStream($options = array()) {
		
		$lastId = null;
		$limit = 10;
		$trim = 75;

		if(isset($options['lastId']) && is_numeric($options['lastId'])) {
			$lastId = $options['lastId'];
		}

		if(isset($options['limit']) && is_numeric($options['limit'])) {
			$limit = $options['limit'];
		}

		if(isset($options['trim']) && is_numeric($options['trim'])) {
			$trim = $options['trim'];
		}

		$conditions = array();

		if(!is_null($lastId)) {
			$conditions['id < '] = $lastId;
		}
		
		$postList = $this->find('all', array(
			'conditions' => $conditions,
			'limit' => $limit,
			'order' => 'id desc'
		));

		foreach($postList as $key => &$post) {
			$body = $post['Post']['body'];
			$body = Sanitize::html($body, array('remove' => true, 'double' => false));
			$post['Post']['body'] = $this->truncateText($body, $trim);
			$post['Post']['created'] = date("d M", strtotime($post['Post']['created']));
			$post['Post']['category'] = "Diary, Personal";
			$post['Post']['likes'] = 126;
			$post['Post']['comments'] = 20;
		}
		
		return $postList;

	}

	public function getPost($id) {
		$post = $this->find('first', array(
			'conditions' => array(
				'id' => $id
			)
		));

		$post['Post']['created'] = date("d M", strtotime($post['Post']['created']));
		$post['Post']['category'] = "Diary, Personal";
		$post['Post']['likes'] = 126;
		$post['Post']['comments'] = 20;
		$post['Post']['tags'] = "holiday, diary, bestmomments";

		return $post;
	}

	public function getNextPostId($id) {
		$nextId = $this->find('first', array(
			'fields' => array('id'),
			'conditions' => array(
				'id <' => $id
			),
			'order' => 'id desc'
		));
		
		return $nextId['Post']['id'];
	}

	public function getPrevPostId($id) {
		$prevId = $this->find('first', array(
			'fields' => array('id'),
			'conditions' => array(
				'id >' => $id
			),
			'order' => 'id asc'
		));

		return $prevId['Post']['id'];
	}

	public function isFirst($id) {
		$minId = $this->find('first', array(
			'fields' => array('min(id) as min')
		));
		if($minId !== false) {
			$minId = $minId[0]['min'];
		}

		$ret = $id <= $minId ? true : false;
		return $ret;
	}

	public function isLast($id) {
		$maxId = $this->find('first', array(
			'fields' => array('max(id) as max')
		));
		if($maxId !== false) {
			$maxId = $maxId[0]['max'];
		}

		$ret = $id >= $maxId ? true : false;
		return $ret;
	}

	public function addPost($data) {
		$data['Post']['created'] = date("Y-m-d H:i:s", time());
		$data['Post']['modified'] = null;

		$this->create();
		$this->save($data, $false);
	}

	private function truncateText($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
}