<?php 

spl_autoload_register(function ($class_name) {
    require_once './Class/'.$class_name . '.php';
});

?>