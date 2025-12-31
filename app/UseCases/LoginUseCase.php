<?php
namespace App\UseCases;

use App\Services\UserService;

class LoginUseCase
{
    public function execute(array $data)
    {
        return (new UserService())->login($data);
    }
}

