<?php 
include __DIR__.'/../partsPhp/header.php';

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'add':
            $user = new User();
            $result = $user->CreateUser($_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['date_naissance'], $_POST['role']);
            echo $result;
            break;
        case 'login':
            $user = new User();
            $result = $user->login($_POST['email'], $_POST['password']);
            echo $result;
            break;
        default:
            break;
    }
}