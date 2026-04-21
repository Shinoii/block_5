<?php
namespace App\Tests\Unit;

use App\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserObjectCanBeCreated(): void
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}