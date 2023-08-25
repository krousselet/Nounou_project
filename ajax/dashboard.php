<?php
include __DIR__.'/../partsPhp/loader.php';
$session = new Session();

if(!$session->isLogin()){
    header('Location: ../index.php');
}
if(isset($_GET['test'])){
    if($_GET['test'] == 'true'){
        $_POST['action'] = 'Id_Enfants';
    }
}
if(isset($_POST['action'])){
    $dashboard = new Dashboard();    
    header('Content-Type: application/json');
    switch($_POST['action']){
        case 'addChild':
            if(empty($_POST['Child_prix'])){
                $_POST['Child_prix'] = null;
            }
            if(empty($_POST['Child_Parent'])){
                $_POST['Child_Parent'] = $session->GetId();
            }
            $dashboard->addChild($_POST['Child_name'], $_POST['Child_prenom'], $_POST['Child_age'], $_POST['Child_prix'],$_POST['Child_Parent']);
            break;
        case 'addPlaning':
            if(isset($_POST['eventEndDate'])){
                $end = $_POST['eventEndDate'];
            }else{
                $end = null;
            }
            $dashboard->AddCalendar($_POST['eventDateStart'],$_POST['eventDateEnd'],$_POST['eventDate'],$_POST['eventRepeat'], $end);
            break;
        case 'getPlaning':
            $result = $dashboard->getCalendar();
            // var_dump(json_encode($result));
            // return json_encode($result);
            echo json_encode([$result,$session->GetNom()." ".$session->GetPrenom()]);
            break;
        case 'getListChild':
            $result = $dashboard->PrintlistChilds($session->GetId());
            echo json_encode($result);
            break;
        case 'getDisponibility':
            $result = $dashboard->printDisponibility();
            echo json_encode($result);
            break;
        case 'addReservation':
            $dashboard->addReservation($_POST['Id'], $_POST['allweek'], $_POST['children']);
            var_dump($_POST);
            break;
        default:
            break;
    }
}