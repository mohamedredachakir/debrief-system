<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService; 
use App\Services\StructureService; 

class UserController extends Controller
{
    private $userService;
    private $structureService;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('admin');
        $this->userService = new UserService();
        $this->structureService = new StructureService();
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

    public function index()
    {
        $users = $this->userService->getAllUsers();
        $this->view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $classes = $this->structureService->getAllClasses();
        $this->view('admin.users.create', ['classes' => $classes]);
    }

    public function store()
    {

        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            $this->redirect('/admin/users/create');
            return;
        }

        $this->userService->createUser($_POST);
        $this->redirect('/admin/users');
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) { $this->redirect('/admin/users'); return; }

        $user = $this->userService->getUser($id);
        $classes = $this->structureService->getAllClasses();

        $this->view('admin.users.edit', ['user' => $user, 'classes' => $classes]);
    }

    public function update()
    {
        $this->userService->updateUser($_POST['id'], $_POST);
        $this->redirect('/admin/users');
    }
}
