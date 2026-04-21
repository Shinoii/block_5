<?php
namespace App\Task5_6\Services;

use App\Task5_6\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): array
    {
        $users = $this->userRepository->findAll();
        return array_map(
            function($user) {
                return [
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                ];
            }, $users);
    }

    public function getUserByEmail(string $email): array
    {
        return $this->userRepository->findUserByEmail($email);
    }
}