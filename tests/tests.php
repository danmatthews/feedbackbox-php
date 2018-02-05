<?php
require 'vendor/autoload.php';
use FeedbackBox\Api;
use PHPUnit\Framework\TestCase;

final class InviteTest extends TestCase
{
    public function testFetchAllUsers()
    {
        $api = new Api('gUJXyjYMUaB8R52EtbJlCXve02mlruI1SozaOqvTXfjmA5Vr3379KlhkPX94xkmW');
        $invite = $api->invites->create([
            'name' => 'James McTavish',
            'email' => 'dan@danmatthews.me',
        ]);
        dump($invite);
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
