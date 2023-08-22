<?php
include __DIR__.'/../partsPhp/loader.php';
$session = new Session();
if(!$session->isLogin()){
    header('Location: ../index.php');
}
if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'addChild':
            $dashboard = new Dashboard();
            if(empty($_POST['Child_prix'])){
                $_POST['Child_prix'] = null;
            }
            if(empty($_POST['Child_Parent'])){
                $_POST['Child_Parent'] = $session->GetId();
            }
            $dashboard->addChild($_POST['Child_name'], $_POST['Child_prenom'], $_POST['Child_age'], $_POST['Child_prix'],$_POST['Child_Parent']);
            break;
        default:
            break;
    }
}