<?php
namespace App\Controllers;

use App\Core\Auth;
use App\UseCases\UpdateUserUseCase;
use App\UseCases\DeleteUserUseCase;
use App\Core\Controller;

class DashboardUserController extends Controller
{
    public function index()
    {
        session_start();

        if (!Auth::check()) {
            header('Location: /signin');
            exit;
        }

        $user = Auth::user();

        $this->view('dashboardUser/index', [
            'user' => $user
        ]);
    }

    public function store()
    {
        session_start();

        if (!Auth::check()) {
            header('Location: /signin');
            exit;
        }

        $errors = [];
        $old = $_POST;

        try {
            $useCase = new UpdateUserUseCase();
            $useCase->execute($_POST, $_SESSION['user_id']);
            $_SESSION['success'] = "Dados atualizados com sucesso";
            header('Location: /dashboard/user');
            exit;
        } catch (\Exception $e) {
            $errors[] = $e->getMessage();
        }

        $this->view('dashboardUser/index', [
            'errors' => $errors,
            'old'    => $old,
            'user'   => Auth::user()
        ]);
    }

    public function deleteUser()
    {
        session_start();

        if (!Auth::check()) {
            header('Location: /signin');
            exit;
        }

        try {
            $useCase = new DeleteUserUseCase();
            $useCase->execute($_SESSION['user_id']);

            session_destroy();

            $_SESSION['success'] = "Usuário eliminado com sucesso";
            header('Location: /signup');
            exit;
        } catch (\Exception $e) {
            $this->view('dashboardUser/index', [
                'errors' => [$e->getMessage()],
                'user'   => Auth::user()
            ]);
        }
    }
}
