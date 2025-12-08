<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function create($name, $email)
    {
        return User::create([
            'name'  => $name,
            'email' => $email
        ]);
    }
    public function emailExists($email)
    {
        return User::where('email', $email)->exists();
    }
}
