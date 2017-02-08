<?php
function NewAutoload($className)
{
    $classPath = './classes/' . $className . '.php';
    if (file_exists($classPath))
    {
    include "$classPath";
    }
}
function INewAutoload($interfaceName)
{
    $interfacePath = './interfaces/' . $interfaceName . '.php';
    if (file_exists($interfacePath))
    {
        include "$interfacePath";
    }
}
spl_autoload_register('NewAutoload');
spl_autoload_register('INewAutoload');
