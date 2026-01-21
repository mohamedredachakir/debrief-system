<?php
// clean_code.php

$directories = ['app', 'config', 'routes', 'public'];
$extensions = ['php'];

function strip_comments($source) {
    if (!function_exists('token_get_all')) {
        return $source;
    }
    $tokens = token_get_all($source);
    $output = '';
    foreach ($tokens as $token) {
        if (is_string($token)) {
            // Simple 1-char token
            $output .= $token;
        } else {
            // Token array
            list($id, $text) = $token;
            switch ($id) { 
                case T_COMMENT: 
                case T_DOC_COMMENT:
                    // Skip comments
                    // Maintain newlines to keep line numbers roughly consistent (optional, currently skipping entirely)
                     if (substr($text, -1) == "\n") {
                         $output .= "\n";
                     }
                    break;
                default:
                    $output .= $text;
                    break;
            }
        }
    }
    return $output;
}

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));

foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($ext, $extensions)) {
        if (strpos($file->getPathname(), 'clean_code.php') !== false) continue;
        if (strpos($file->getPathname(), '/vendor/') !== false) continue;
        if (strpos($file->getPathname(), '/storage/') !== false) continue;

        echo "Cleaning " . $file->getPathname() . "...\n";
        $content = file_get_contents($file->getPathname());
        $newContent = strip_comments($content);
        
        // Basic cleanup of multiple empty lines
        $newContent = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n\n", $newContent);
        
        file_put_contents($file->getPathname(), trim($newContent) . "\n");
    }
}
echo "Codebase cleaned.\n";
