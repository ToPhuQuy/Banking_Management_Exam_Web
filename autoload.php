<?php

// Auto Load file when class is imported
define('ROOT', __DIR__);

$autoLoadFunc = function ($class_name)
{
    $relative_path = str_replace('\\', '/', $class_name) . '.php';
    $filePath = ROOT . '/' . $relative_path;
    if (file_exists($filePath))
    {
        require_once $filePath;
    }
};

// Register
spl_autoload_register($autoLoadFunc);
