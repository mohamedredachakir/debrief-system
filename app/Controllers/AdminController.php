<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Guard: Check if user is admin (pseudo-code)
        // if ($_SESSION['user_role'] !== 'admin') $this->redirect('/login');
        
        $this->view('admin.dashboard');
    }
}
