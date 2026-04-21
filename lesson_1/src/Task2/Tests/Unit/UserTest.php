<?php
namespace App\Task2\Tests\Unit;

use App\Task2\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCanBeCreated(): void
    {
        $user = new User('Имя', 21);

        $this->assertEquals('Имя', $user->getName());
        $this->assertEquals(21, $user->getAge());
    }
}