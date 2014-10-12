# Simply Satisfied PHP API Wrapper
This library is a work in progress, pull requests are accepted with thanks.

## Install
Install with [Composer](http://getcomposer.org).

```json
{
	"require": {
		"simply/simply-php":"dev-master"
	}
}
```
>**Note**: Tagged releases will be coming soon!

## Resources
- Invites (list all, view one, create)
- Users (list all, view one, update)
- Company (list all, view one)
- Responses (list all, view one, create)

## Usage

```php
<?php

// Initialise with your API key.
$api = new Simply\Api('api-key-here');

// Get all invites
$invites = $api->invites->makeRequest();

// Set the page you're requesting.
$invites = $api->invites->setPage(3)->makeRequest();

// Get a single invite object.
$singleInvite = $api->invites->find(25442)->makeRequest();

// Create an invite
$api->invites->create([
	"name"       => "Frank Reynolds",
	"email"      => "frank@wolfcola.com",
	"send_email" => TRUE
]);

// Get all users
$allUsers = $api->users->makeRequest();

// Get a single user.
$me = $api->users->find(25518)->makeRequest();
```
