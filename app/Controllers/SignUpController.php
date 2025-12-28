<?php
namespace App\Controllers;

use App\Core\Controller;

class SignUpController extends Controller
{
    public function index()
    {
       
        $this->view('signup/index');
    }

   
}
