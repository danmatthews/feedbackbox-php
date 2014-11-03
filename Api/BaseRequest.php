<?php namespace Simply\Api;

use GuzzleHttp\Client;

class BaseRequest
{

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PATCH = 'PATCH';

    /**
     * The currently active endpoint.
     * @var string
     */
    protected $endpoint;

    /**
     * The fully qualified URL of the API.
     * @var string
     */
    protected $url = 'https://app.simplysatisfied.net/api/v1/';

    /**
     * The user's API key.
     * @var string
     */
    protected $apiKey;

    /**
     * The currently active request method.
     * @var string
     */
    protected $method = 'GET';

    /**
     * The list of URL query parameters
     * @var array
     */
    protected $queryParams = array();

    /**
     * A shortcut array for ?include=<value>
     * @var array
     */
    protected $includes = array();

    /**
     * Request body.
     * @var array
     */
    protected $body = array();

    /**
     * Set the provided API key
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->setApiKey($apiKey);
    }

    /**
     * Return the set API key.
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Setter for the API key
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Set the request body
     * @param array $body
     */
    public function setBody(array $body)
    {
        $this->body = $body;
    }

    /**
     * Make the request to the API
     * @return mixed
     */
    public function makeRequest()
    {
        $url = $this->url . $this->endpoint;
        $client = new Client();
        $rdata = array(
            'headers' => array('X-Simply-Auth' => $this->apiKey),
        );
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

    /**
     * Set a specified URL query parameter
     * @param string $key
     * @param string $value
     */
    protected function setQueryParam($key, $value)
    {
        $this->queryParams[$key] = $value;
    }

    /**
     * Set one of the includes in the query parameters
     * @param string $include
     */
    public function setInclude($include)
    {
        $this->includes[] = $include;
        return $this;
    }

    /**
     * Set the page Query parameter
     * @param integer $page
     */
    public function setPage($page = 0)
    {
        $this->setQueryParam('page', $page);
        return $this;
    }

    /**
     * Shorthand for the makeRequest() function
     * @return mixed JsonResponse
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * Set which endpoint you are making a request to.
     * @param string $endpoint
     */
    protected function setEndpoint($endpoint)
    {
        $this->endpoint = ltrim($endpoint, '/');
    }

    /**
     * Set the request method.
     * @param string $method
     */
    protected function setMethod($method)
    {
        $this->method = $method;
    }
}

