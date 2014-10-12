<?php namespace Simply\Api;

class Company extends BaseRequest {

	public function __construct($apiKey) {
		parent::__construct($apiKey);
		$this->setEndpoint('invite');
		$this->setMethod(parent::METHOD_GET);
	}

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

	public function metadata() {
		return new \Simply\Api\Metadata\Company($this->getApiKey());
	}

}
