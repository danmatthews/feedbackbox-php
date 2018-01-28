<?php namespace FeedbackBox;

class Api
{
    /**
     * The users' API key
     * @var string
     */
    protected $apiKey;

    /**
     * Setup the object and assign the API Key.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->invites = $this->invites();
        $this->responses = $this->responses();
        $this->users = $this->users();
        $this->company = $this->company();
    }

    /**
     * Get an instance of the invite class.
     * @return FeedbackBox\Api\Invite
     */
    public function invites()
    {
        return new \FeedbackBox\Api\Invite($this->apiKey);
    }
    /**
     * Get an instance of the response class.
     * @return FeedbackBox\Api\Response
     */
    public function responses()
    {
        return new \FeedbackBox\Api\Response($this->apiKey);
    }

    /**
     * Get an instance of the user class.
     * @return FeedbackBox\Api\User
     */
    public function users()
    {
        return new \FeedbackBox\Api\Users($this->apiKey);
    }

    /**
     * Get an instance of the company class.
     * @return FeedbackBox\Api\Company
     */
    public function company()
    {
        return new \FeedbackBox\Api\Company($this->apiKey);
    }
}

