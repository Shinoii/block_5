<?php

namespace App\Task5_6\Repositories;

interface UserRepositoryInterface
{
    public function findAll(): array;
    public function findUserByEmail(string $email): ?array;
}