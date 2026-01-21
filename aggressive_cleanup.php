<?php
// aggressive_cleanup.php

function clean_php($content) {
    $tokens = token_get_all($content);
    $output = '';
    foreach ($tokens as $token) {
        if (is_string($token)) {
            $output .= $token;
        } else {
            list($id, $text) = $token;
            if ($id === T_COMMENT || $id === T_DOC_COMMENT) {
                continue;
            }
            $output .= $text;
        }
    }
    return $output;
}

function clean_blade($content) {
    // Remove {{-- --}}
    return preg_replace('/\{\{--.*?--\}\}/s', '', $content);
}

function clean_css($content) {
    // Remove /* */
    return preg_replace('/\/\*.*?\*\//s', '', $content);
}

function clean_sql($content) {
    // Remove -- comments
    return preg_replace('/--.*$/m', '', $content);
}

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
foreach ($it as $file) {
    if ($file->isDir()) continue;
    $path = $file->getPathname();
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    
    if (strpos($path, '/vendor/') !== false || strpos($path, '/.git/') !== false || strpos($path, 'aggressive_cleanup.php') !== false) {
        continue;
    }

    $content = file_get_contents($path);
    $original = $content;

    if ($ext === 'php') {
        if (strpos($path, '.blade.php') !== false) {
            $content = clean_blade($content);
        } else {
            $content = clean_php($content);
        }
    } elseif ($ext === 'css') {
        $content = clean_css($content);
    } elseif ($ext === 'sql') {
        $content = clean_sql($content);
    }

    if ($content !== $original) {
        echo "Cleaned $path\n";
        // Final trim and whitespace normalization
        $content = preg_replace("/\n\s*\n\s*\n/", "\n\n", $content);
        file_put_contents($path, trim($content) . "\n");
    }
}
echo "Full cleanup done.\n";
