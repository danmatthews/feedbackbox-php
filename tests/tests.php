<?php
require 'vendor/autoload.php';
use FeedbackBox\Api;
use PHPUnit\Framework\TestCase;

final class InviteTest extends TestCase
{
    public function testFetchAllUsers()
    {
        // $users = $api->users->all()->get();
        // dump($users);
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        // $this->expectException(InvalidArgumentException::class);

        // Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertTrue(true);
        // $this->assertEquals(
            // 'user@example.com',
            // Email::fromString('user@example.com')
        // );
    }
}
