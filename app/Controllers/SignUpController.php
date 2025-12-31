<?php
namespace App\Controllers;

use App\Core\Controller;
use App\UseCases\CreateUserUseCase;

class SignUpController extends Controller
{
    public function index()
    {
      
        $errors = [];
        $old = [];

        $this->view('signup/index', [
            'errors' => $errors,
            'old'    => $old
        ]);
    }

    public function store()
    {
        $errors = [];
        $old = $_POST;

        try {
            $useCase = new CreateUserUseCase();
            $useCase->execute($_POST);

            header('Location: /signin');
            exit;
        } catch (\Exception $e) {
            $errors[] = $e->getMessage();
        }

       
        $this->view('signup/index', [
            'errors' => $errors,
            'old'    => $old
        ]);
    }
}
