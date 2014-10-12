<?php namespace Simply\Api\Metadata;

class Company extends \Simply\Api\BaseRequest
{
    public function sectors()
    {
        $this->setEndpoint('company/metadata/sectors');
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }
}
