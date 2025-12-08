<?php
namespace App\UseCases;

use App\Services\UserService;

class CreateUserUseCase
{
    public function execute($name, $email)
    {
        return (new UserService())->create($name, $email);
    }
}
