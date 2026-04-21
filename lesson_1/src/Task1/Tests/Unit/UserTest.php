<?php
namespace App\Task1\Tests\Unit;

use App\Task1\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserObjectCanBeCreated(): void
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}