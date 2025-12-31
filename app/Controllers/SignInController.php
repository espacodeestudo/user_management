<?php
namespace App\Controllers;

use App\Core\Controller;
use App\UseCases\LoginUseCase;

class SignInController extends Controller
{
    public function index()
    {

        $errors=[];
        $old = [];
       
        $this->view('signin/index', [
            'errors' => $errors,
            'old' => $old,
        ]);

    }

   public function login()
{
    $errors = [];
    $old = $_POST;

    try {
        $useCase = new LoginUseCase();
        $user = $useCase->execute($_POST);

        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_role'] = $user->role;

        if ($user->role === 'user') {
            header('Location: /dashboard/user');
            exit;
        }

        header('Location: /dashboard');
        exit;

    } catch (\Exception $e) {
        $errors[] = $e->getMessage();
    }

    $this->view('signin/index', [
        'errors' => $errors,
        'old'    => $old
    ]);
}

   
}
