<?php

namespace App\Task5_6\Tests\Feature;

use App\Task5_6\Entity\User;
use App\Task5_6\Repositories\UserRepositoryInterface;
use App\Task5_6\Services\UserService;
use PDO;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testUserRepositoryReturnsUserByEmail()
    {
        $mock = $this->createMock(UserRepositoryInterface::class);

        $mock->expects($this->once())
            ->method('findUserByEmail')
            ->with('test@gmail.com')
            ->willReturn([
                'id' => 1,
                'name' => 'John',
                'email' => 'test@mail.com'
            ]);

        $service = new UserService($mock);

        $user = $service->getUserByEmail('test@gmail.com');

        $this->assertNotNull($user);
        $this->assertEquals('John', $user['name']);
        $this->assertEquals('test@mail.com', $user['email']);
    }
}