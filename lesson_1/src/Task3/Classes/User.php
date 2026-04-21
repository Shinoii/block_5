<?php

namespace App\Task3\Classes;

class User
{
    private string $name;
    private string $surname;
    private int $age;

    public function __construct(string $name, string $surname, int $age){
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }
}