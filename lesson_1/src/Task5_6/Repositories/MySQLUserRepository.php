<?php
namespace App\Task5_6\Repositories;

use App\Task5_6\Entity\User;

class MySQLUserRepository implements UserRepositoryInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT id, name, email FROM users");

        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new User($row['id'], $row['name'], $row['email']);
        }

        return $users;
    }

    public function findUserByEmail(string $email): ?array
    {
        $sql = "SELECT id, name, email FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'email' => $email
        ]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ?: null;
    }
}