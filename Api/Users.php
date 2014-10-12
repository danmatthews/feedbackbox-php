<?php namespace Simply\Api;

class Users extends BaseRequest
{

    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
        $this->setEndpoint('invite');
        $this->setMethod(parent::METHOD_GET);
    }

    public function all()
    {
        $this->setEndpoint('user');
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }

    public function find($id)
    {
        $this->setEndpoint('user/'.(int)$id);
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }
    public function update($id, array $data)
    {
        $this->setEndpoint('user/'.(int)$id);
        $this->setMethod(parent::METHOD_PATCH);
        return $this;
    }

    public function create()
    {

    }
}

