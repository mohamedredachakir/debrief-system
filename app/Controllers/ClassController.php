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
        $this->service = new StructureService();
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

        // Fetch class by ID (need to add this to Service/Repo first if missing)
        // For now assuming find method exists or implementing it
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
