<?php
namespace App\Core;

use App\Repositories\UserRepository;

class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public static function user()
    {
        if (!self::check()) {
            return null;
        }

        $repo = new UserRepository();
        return $repo->findById($_SESSION['user_id']);
    }

    public static function logout()
    {
        session_start();
        session_destroy();

        header('Location: /signin');
        exit;
    }
}
