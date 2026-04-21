<?php
namespace App\Task5_6\Controllers;

use App\Task5_6\Services\UserServiceInterface;

class UserController
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(): array
    {
        return $this->userService->getAllUsers();
    }

    public function getUserByEmail(string $email): array
    {
        return $this->userService->getUserByEmail($email);
    }
}