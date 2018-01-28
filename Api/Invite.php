<?php namespace FeedbackBox\Api;

class Invite extends BaseRequest
{

    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
        $this->setEndpoint('invite');
        $this->setMethod(parent::METHOD_GET);
    }

    public function all()
    {
        $this->setEndpoint('invite');
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }

    public function find($id)
    {
        $this->setEndpoint('invite/'.(int)$id);
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }

    public function create(array $body)
    {
        $this->setEndpoint('invite/');
        $this->setMethod(parent::METHOD_POST);
        $this->setBody($body);
        return $this;
    }
}

