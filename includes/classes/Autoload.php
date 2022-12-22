<?php
function autoload($class_name)
{
    $directories = array(
        'includes/classes/'
    );
    foreach ($directories as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            include_once($directory . $class_name . '.php');
        }
    }
}

spl_autoload_register('autoload');
