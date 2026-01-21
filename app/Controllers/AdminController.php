<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('admin');
    }

    private function checkAuth($requiredRole = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        if ($requiredRole && $_SESSION['user_role'] !== $requiredRole) {
            header('Location: /login');
            exit();
        }
    }

    public function dashboard()
    {
        $this->view('admin.dashboard');
    }
}
