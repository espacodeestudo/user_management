<?php
namespace App\Controllers;

use App\Core\Controller;
use App\UseCases\CreateUserUseCase;
use App\UseCases\ListUsersUseCase;

class UserController extends Controller
{
    public function index()
    {
        $users = (new ListUsersUseCase())->execute();
        $this->view('users/index', ['users' => $users]);
    }

    public function store()
    {
        $name  = $_POST['name'];
        $email = $_POST['email'];

        (new CreateUserUseCase())->execute($name, $email);

        header('Location: /users');
    }
    
}
