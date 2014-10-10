# Simply Satisfied PHP API Wrapper
Work in progress.

## Example Usage

```php
<?php
$api = new Simply\Api('api-key-here');
$allInvites = $api->invites()->makeRequest();
$allUsers = $api->users()->makeRequest();
```
