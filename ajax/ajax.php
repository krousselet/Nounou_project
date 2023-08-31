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
            // var_dump($_POST['email']);
            // var_dump($_POST['password']);
            $result = $user->login($_POST['email'], $_POST['password']);
            // $result = false;
            if($result == false){
                echo "false";
                break;
            }
            // var_dump($result);
            $session = new Session();
            $session->Login($result);
            echo "true";
            break;
        case 'logout':
            $session = new Session();
            $session->Logout();
            echo "true";
            break;
        case 'reset_sendmail':
            $user = new User();
            $result = $user->reset_sendmail($_POST['mail']);
            echo "true";
            break;
        case 'reset_checkCode':
            $user = new User();
            $result = $user->reset_checkCode($_POST['mail'], $_POST['code']);
            echo $result;
            break;
        case'reset_password':
            $user = new User();
            $result = $user->reset_password($_POST['mail'],$_POST['code'], $_POST['pass']);
            echo $result;
            // echo password_verify("Panda".$_POST['pass']."Town", $result);
            break;
        case 'change_password':
            $session = new Session();
            // var_dump($session->)
            
            echo $session->ChangePasswordProfile($_POST['newpass'],$_POST['oldpass']);;
            break;
        default:
            break;
    }
}