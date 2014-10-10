<?php namespace Simply;

class Api {
	protected $apiKey;
	public function __construct($apiKey) {
		$this->apiKey = $apiKey;
	}

	public function invites() {}
	public function responses() {}
	public function users() {
		return new \Simply\Api\Users($this->apiKey);
	}
	public function company() {
		return new \Simply\Api\Company($this->apiKey);
	}
	public function metadata() {}
}
