<?php
namespace App\Task5_6\Tests\Feature;

use App\Task5_6\Controllers\UserController;
use App\Task5_6\Repositories\MySQLUserRepository;
use App\Task5_6\Services\UserService;
use PHPUnit\Framework\TestCase;
use PDO;

class UserTest extends TestCase
{
    protected \PDO $pdo;
    protected function setUp(): void
    {
        $this->pdo = new \PDO('sqlite::memory:');

        $this->pdo->exec("
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                email TEXT
            )
        ");
        $this->pdo->exec("
            INSERT INTO users (id, name, email) VALUES
            (1, 'John', 'john@example.com'),
            (2, 'Dmitry', 'dmitry@yandex.ru')
        ");

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function testUserApiReturnsUsers()
    {
        $userRepository = new MySQLUserRepository($this->pdo);
        $userService = new UserService($userRepository);
        $userController = new UserController($userService);

        $response = $userController->index();

        $this->assertCount(2, $response);
    }
}
