<?php 

spl_autoload_register(function ($class_name) {
    $class_path = __DIR__.'/../Class/'.$class_name . '.php';
    if (file_exists($class_path)) {
        require_once $class_path;
    }else{
        echo 'Class'.$class_name.' not found';
        die();
    }
});

?>