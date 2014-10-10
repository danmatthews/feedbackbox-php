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
	protected $queryParams = array();
	protected $includes = array();
	protected $body = array();

	public function __construct($apiKey) {
		$this->setApiKey($apiKey);
	}
	public function getApiKey() {
		return $this->apiKey;
	}
	public function setApiKey($apiKey) {
		$this->apiKey = $apiKey;
	}

	public function setBody(array $body) {
		$this->body = $body;
	}

	public function makeRequest() {
		$url = $this->url . $this->endpoint;
		$client = new Client();
		$rdata = [
			'headers' => array('X-Simply-Auth' => $this->apiKey),
		];
		if (!empty($this->queryParams)) {
			$rdata['query'] = $this->queryParams;
		}
		if (!empty($this->includes)) {
			$rdata['query']['include'] = implode(',', $this->includes);
		}
		if (!empty($this->body)) {
			$rdata['body'] = $this->body;
		}
		switch ($this->method) {
			case self::METHOD_PATCH:
				$response = \GuzzleHttp\get($url, $rdata);
				break;
			case self::METHOD_POST:
				$response = \GuzzleHttp\post($url, $rdata);
				break;
			default:
				$response = \GuzzleHttp\get($url, $rdata);
		}
		return $response->json();

	}
	protected function setQueryParam($key, $value) {
		$this->queryParams[$key] = $value;
	}

	public function setInclude($include) {
		$this->includes[] = $include;
		return $this;
	}

	public function setPage($page = 0) {
		$this->setQueryParam('page', $page);
		return $this;
	}

	/**
	 * Shorthand for the makeRequest() function
	 *
	 * @return mixed JsonResponse
	 */
	public function get() {
		return $this->makeRequest();
	}
	public function setEndpoint($endpoint) {
		$this->endpoint = ltrim($endpoint, '/');
	}
	public function setMethod($method) {
		$this->method = $method;
	}
	public function getResults() {}
}
