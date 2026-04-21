<?php
namespace App\Task3\Tests\Unit;

use App\Task3\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserFullName(): void
    {
        $user = new User('Полное', 'Имя',21);

        $this->assertEquals('Полное Имя', $user->getFullName());
    }
}