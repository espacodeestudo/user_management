<?php
namespace App\Controllers;

use App\Core\Controller;

class SignInController extends Controller
{
    public function index()
    {
       
        $this->view('signin/index');
    }

   
}
