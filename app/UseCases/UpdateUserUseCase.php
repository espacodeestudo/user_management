<?php

namespace App\UseCases;

use App\Services\UserService;

class UpdateUserUseCase
{
    public function execute(array $data, int $userId)
    {
        return (new UserService())->update($data, $userId);
    }
}
