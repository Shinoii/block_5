<?php
namespace App\Task5_6\Tests\Feature;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class UserTest extends TestCase
{
    protected \PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = new \PDO(
            'mysql:host=mysql;dbname=effective',
            'user',
            'user'
        );

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL
            )
        ");

        $this->pdo->exec("
            INSERT INTO users (id, name, email) VALUES
            (1, 'John', 'john@example.com'),
            (2, 'Dmitry', 'dmitry@yandex.ru')
        ");
    }

    protected function tearDown(): void
    {
        $this->pdo->exec("TRUNCATE TABLE users");
    }

    public function testUserApiReturnsUsers()
    {
        $client = new Client([
            'base_uri' => 'http://nginx:80',
        ]);

        $response = $client->get('/task5_6/users');

        $this->assertEquals(200, $response->getStatusCode());

        $body = $response->getBody()->getContents();
        $this->assertJson($body);

        $data = json_decode($body, true);

        $this->assertIsArray($data);
        $this->assertCount(2, $data);

        $this->assertEquals('John', $data[0]['name']);
        $this->assertEquals('Dmitry', $data[1]['name']);
    }
}
