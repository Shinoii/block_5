<?php
namespace App\Task5_6\Tests\Feature;

use App\Task5_6\Controllers\UserController;
use App\Task5_6\Repositories\MySQLUserRepository;
use App\Task5_6\Services\UserService;
use PHPUnit\Framework\TestCase;
use PDO;

class UserTest extends TestCase
{
    public function testUserApiReturnsUsers()
    {
        $pdo = new \PDO('sqlite::memory:');
        $pdo->exec("
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                email TEXT
            )
        ");
        $pdo->exec("
            INSERT INTO users (name, email) VALUES
            ('John', 'john@example.com'),
            ('Dmitry', 'dmitry@yandex.ru')
        ");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $userRepository = new MySQLUserRepository($pdo);
        $userService = new UserService($userRepository);
        $userController = new UserController($userService);

        $response = $userController->index();

        $this->assertCount(2, $response);
    }
}
