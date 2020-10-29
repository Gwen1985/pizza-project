<?php

declare(strict_types=1);

spl_autoload_register('autoLoader');

function autoLoader($className): void
{
    $path = 'Models/';
    $extension = ".php";
    $fullpath = $path . $className . $extension;

    require_once $fullpath;
}

require 'Views/homePage.php';



?>