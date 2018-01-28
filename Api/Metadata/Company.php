<?php namespace FeedbackBox\Api\Metadata;

class Company extends \FeedbackBox\Api\BaseRequest
{
    public function sectors()
    {
        $this->setEndpoint('company/metadata/sectors');
        $this->setMethod(parent::METHOD_GET);
        return $this;
    }
}
