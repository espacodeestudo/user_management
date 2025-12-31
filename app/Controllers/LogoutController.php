<?php
namespace App\Controllers;

use App\Core\Auth;

class LogoutController
{
    public function index()
    {
        Auth::logout();
    }
}
