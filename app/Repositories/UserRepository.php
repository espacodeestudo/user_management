<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }
    public function create(array $data)
    {
        return User::create($data);
    }

    public function updateById(int $id, array $data)
    {
        $user = User::find($id);

        if (!$user) {
            throw new \Exception("Usuário não encontrado.");
        }

        $user->update($data);

        return $user;
    }

    public function delete(int $id){
        $user = User::find($id);

        if (!$user) {
            throw new \Exception("Usuário não encontrado.");
        }

        $user->delete();

        return true;
    }


    public function emailExists($email)
    {
        return User::where('email', $email)->exists();
    }
    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function findById($id)
    {
        return User::find($id);
    }
}
