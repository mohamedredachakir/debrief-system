<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\StructureService;

class ClassController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth('admin');
        $this->service = new StructureService();
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
        $classes = $this->service->getAllClasses();
        $this->view('admin.classes.index', ['classes' => $classes]);
    }

    public function create()
    {
         $this->view('admin.classes.create');
    }

    public function store()
    {
        $name = $_POST['name'] ?? '';
        if (!empty($name)) {
            $this->service->createClass($name);
            $this->redirect('/admin/classes');
        } else {
             $this->view('admin.classes.create', ['error' => 'Name is required']);
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) { $this->redirect('/admin/classes'); return; }

        $class = $this->service->getClass($id); 
        $this->view('admin.classes.edit', ['class' => $class]);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';

        if ($id && !empty($name)) {
            $this->service->updateClass($id, $name);
        }
        $this->redirect('/admin/classes');
    }
}
