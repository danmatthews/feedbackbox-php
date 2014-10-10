<?php namespace Simply\Api;

class Company extends BaseRequest {

	public function all() {
		$this->setEndpoint('company');
		$this->setMethod(parent::METHOD_GET);
		return $this;
	}

	public function find($id) {
		$this->setEndpoint('company/'.$id);
		$this->setMethod(parent::METHOD_GET);
		return $this;
	}

}
