<?php
spl_autoload_register(function ($class) {
    $path = str_replace('App\\', 'App/', $class);
    $path = str_replace('\\', '/', $path);
    $file = __DIR__ . '/' . $path . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
