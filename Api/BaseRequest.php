<?php namespace Simply\Api;

use GuzzleHttp\Client;

class BaseRequest {

	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_PATCH = 'PATCH';

	protected $endpoint;
	protected $url = 'http://simply.local/api/v1/';
	protected $apiKey;
	protected $method = 'GET';
	public function __construct($apiKey) {
		$this->setApiKey($apiKey);
	}
	public function setApiKey($apiKey) {
		$this->apiKey = $apiKey;
	}
	public function makeRequest() {
		$url = $this->url . $this->endpoint;
		$client = new Client();
		$rdata = [
			'headers' => ['X-Simply-Auth' => $this->apiKey],
		];
		switch ($this->method) {
			case self::METHOD_PATCH:
				$response = \GuzzleHttp\get($url, $rdata);
				break;
			default:
				$response = \GuzzleHttp\get($url, $rdata);
		}
		var_dump($response->json());

	}
	public function setPage($page = 0) {

	}
	public function get() {
		$this->makeRequest();
	}
	public function setEndpoint($endpoint) {
		$this->endpoint = ltrim($endpoint, '/');
	}
	public function setMethod($method) {
		$this->method = $method;
	}
	public function getResults() {}
}
