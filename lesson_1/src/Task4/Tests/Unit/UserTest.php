<?php

use App\Task4\Classes\User;

test('User объект создается успешно', function () {
    $user = new User('name', 'surname', 21);

    expect($user)->toBeInstanceOf(User::class);
});