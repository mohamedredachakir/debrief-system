<?php

namespace App\Core;

use eftec\bladeone\BladeOne;

abstract class Controller
{
    protected $blade;

    public function __construct()
    {
        $root = dirname(__DIR__, 2); // /var/www/html
        $views = $root . '/views';
        $cache = $root . '/storage/cache';
        // echo "Debug Cache Path: " . $cache;

        if (!is_dir($cache)) {
            mkdir($cache, 0777, true);
        }

        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); 
    }

    protected function view($template, $data = [])
    {
        echo $this->blade->run($template, $data);
    }

    protected function redirect($url)
    {
        header("Location: " . $url);
        exit();
    }
}
