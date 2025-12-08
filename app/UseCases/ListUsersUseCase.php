<?php
namespace App\UseCases;

use App\Repositories\UserRepository;

class ListUsersUseCase
{
    public function execute()
    {
        return (new UserRepository())->all();
    }
}
