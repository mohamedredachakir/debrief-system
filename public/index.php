<?php

require_once __DIR__ . '/../vendor/autoload.php';



use Dotenv\Dotenv;
use App\Core\Router;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Initialize Router
$router = new Router();

// Load Routes
require_once __DIR__ . '/../routes/web.php';

// Dispatch
$router->run();
