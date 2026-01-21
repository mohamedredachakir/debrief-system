<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService; // We will use UserService directly or via StructureService if preferred. Let's stick to Service pattern.
use App\Services\StructureService; // To get classes for dropdown

class UserController extends Controller
{
    private $userService;
    private $structureService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->structureService = new StructureService();
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
        // Basic validation
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
