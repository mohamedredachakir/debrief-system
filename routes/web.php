<?php

use App\Controllers\HomeController;

// Example routes
// $router->get('/', [HomeController::class, 'index']);
// $router->get('/login', [AuthController::class, 'loginForm']);
// $router->post('/login', [AuthController::class, 'login']);

$router->get('/', ['HomeController', 'index']);
$router->get('/login', ['AuthController', 'loginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/logout', ['AuthController', 'logout']);

$router->get('/admin/dashboard', ['AdminController', 'dashboard']);
$router->get('/admin/classes', ['ClassController', 'index']);

$router->get('/admin/classes/create', ['ClassController', 'create']);
$router->post('/admin/classes/store', ['ClassController', 'store']);
$router->get('/admin/classes/edit', ['ClassController', 'edit']);
$router->post('/admin/classes/update', ['ClassController', 'update']);

$router->get('/admin/classes/sprints', ['SprintController', 'index']);
$router->get('/admin/sprints/create', ['SprintController', 'create']);
$router->post('/admin/sprints/store', ['SprintController', 'store']);
$router->get('/admin/sprints/edit', ['SprintController', 'edit']);
$router->post('/admin/sprints/update', ['SprintController', 'update']);
$router->get('/admin/competences', ['CompetenceController', 'index']);
$router->get('/admin/competences/create', ['CompetenceController', 'create']);
$router->post('/admin/competences/store', ['CompetenceController', 'store']);
$router->get('/admin/competences/edit', ['CompetenceController', 'edit']);
$router->post('/admin/competences/update', ['CompetenceController', 'update']);
$router->get('/admin/users', ['UserController', 'index']);
$router->get('/admin/users/create', ['UserController', 'create']);
$router->post('/admin/users/store', ['UserController', 'store']);
$router->get('/admin/users/edit', ['UserController', 'edit']);
$router->post('/admin/users/update', ['UserController', 'update']);

$router->get('/admin/sprints/briefs', ['BriefController', 'index']);

$router->get('/teacher/dashboard', ['TeacherController', 'dashboard']);
$router->get('/teacher/debrief', ['TeacherController', 'debrief']);
$router->get('/teacher/evaluate', ['TeacherController', 'evaluate']);
$router->post('/teacher/evaluate/store', ['TeacherController', 'storeEvaluation']);

$router->get('/learner/dashboard', ['LearnerController', 'dashboard']);








