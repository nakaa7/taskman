<?php

function autoload($class_name)
{
    $segmentsPach = explode('\\', $class_name);

    switch ($segmentsPach[0]) {
        case 'app':
            $path = ROOT . '/' . substr(implode(DIRECTORY_SEPARATOR, $segmentsPach), 4) . '.php';
            break;
        case 'liw':
            $path = ROOT . '/vendor/' . implode(DIRECTORY_SEPARATOR, $segmentsPach) . '.php';
            break;
    }

    if (file_exists($path)) {
        include $path;
    }
}

spl_autoload_register('autoload', true, true);
