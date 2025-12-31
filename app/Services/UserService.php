<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

class UserService
{
    public function create(array $data)
    {
        if (strlen($data['first_name']) < 2 || strlen($data['last_name']) < 2 ) {
            throw new Exception("Nome inválido.");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }

        $repo = new UserRepository();

        if ($repo->emailExists($data['email'])) {
            throw new Exception("Email já existe.");
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $repo->create($data);
    }

    public function login(array $data){
        $repo = new UserRepository();
        $user = $repo->getByEmail($data['email']);

            if (!$user || !password_verify($data['password'], $user->password)) {
                throw new \Exception("Email ou senha inválidos.");
            }
             return $user;
    }

    public function update(array $data, int $userId)
    {
        if (!empty($data['first_name']) && strlen($data['first_name']) < 2) {
            throw new Exception("Primeiro nome inválido.");
        }

        if (!empty($data['last_name']) && strlen($data['last_name']) < 2) {
            throw new Exception("Último nome inválido.");
        }

        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }

        
        $allowed = [
            'first_name',
            'last_name',
            'phone',
            'address',
            'gender',
            'birth_date',
            'nationality'
        ];

        $updateData = array_intersect_key($data, array_flip($allowed));

        $repo = new UserRepository();
        return $repo->updateById($userId, $updateData);
    }

    public function deleteUser(int $userId){
        $repo = new UserRepository();

        return $repo->delete($userId);
    }
}
