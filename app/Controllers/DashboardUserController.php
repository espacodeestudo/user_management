<?php
namespace App\Controllers;

use App\Core\Controller;

class DashboardUserController extends Controller
{
    public function index()
    {
       
        $this->view('dashboardUser/index');
    }

   
}
