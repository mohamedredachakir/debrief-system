<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct()
    {
        parent::__construct();
        $this->authService = new AuthService();
    }

    public function loginForm()
    {
        $this->view('auth.login');
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->view('auth.login', ['error' => 'Please fill in all fields']);
            return;
        }

        $user = $this->authService->authenticate($email, $password);

        if ($user) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->role;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_class_id'] = $user->class_id ?? null;

            switch ($user->role) {
                case 'admin':
                    $this->redirect('/admin/dashboard');
                    break;
                case 'teacher':
                    $this->redirect('/teacher/dashboard');
                    break;
                case 'learner':
                    $this->redirect('/learner/dashboard');
                    break;
                default:
                    $this->redirect('/');
            }
        } else {
            $this->view('auth.login', ['error' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        $this->redirect('/');
    }
}
