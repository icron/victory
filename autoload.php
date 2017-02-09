<?php
function autoloader($className)
{
    $classPath = __DIR__ . '/classes/' . $className . '.php';
    if (file_exists($classPath)) {
        include "$classPath";
    }
}

spl_autoload_register('autoloader');
