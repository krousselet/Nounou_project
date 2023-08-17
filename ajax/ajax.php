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

if(isset($_POST['action'])){
    header('Content-Type: application/json');
    switch($_POST['action']){
        case 'add':
            $user = new User();
            $result = $user->CreateUser($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['date_naissance'], $_POST['role']);
            echo "true";
            break;
        case 'login':
            $user = new User();
            $result = $user->login($_POST['email'], $_POST['password']);
            if($result == false){
                echo "false";
                break;
            }
            $session = new Session();
            $session->Login($result);
            echo "true";
            break;
        case 'logout':
            $session = new Session();
            $session->Logout();
            echo "true";
            break;
        default:
            break;
    }
}