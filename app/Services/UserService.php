<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

class UserService
{
    public function create($name, $email)
    {
        if (strlen($name) < 3) {
            throw new Exception("Nome inválido.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }

        $repo = new UserRepository();

        if ($repo->emailExists($email)) {
            throw new Exception("Email já existe.");
        }

        return $repo->create($name, $email);
    }
}
