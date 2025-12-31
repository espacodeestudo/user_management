<?php

namespace App\UseCases;

use App\Services\UserService;

class DeleteUserUseCase
{
    public function execute(int $userId)
    {
        return (new UserService())->deleteUser($userId);
    }
}
