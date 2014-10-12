<?php namespace Simply;

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
     * @return Simply\Api\Invite
     */
    public function invites()
    {
        return new \Simply\Api\Invite($this->apiKey);
    }
    /**
     * Get an instance of the response class.
     * @return Simply\Api\Response
     */
    public function responses()
    {
        return new \Simply\Api\Response($this->apiKey);
    }

    /**
     * Get an instance of the user class.
     * @return Simply\Api\User
     */
    public function users()
    {
        return new \Simply\Api\Users($this->apiKey);
    }

    /**
     * Get an instance of the company class.
     * @return Simply\Api\Company
     */
    public function company()
    {
        return new \Simply\Api\Company($this->apiKey);
    }
}

