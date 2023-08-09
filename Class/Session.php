<?php 

class Session extends Bdd{

    private $user;

    public function __construct(){
        session_start();
        if(isset($_SESSION['id'])){
            $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE Id_identifiant = ?");
            $req->execute(array($_SESSION['id']));
            // $req->execute(array("1"));
            $this->user = $req->fetch();
            // $this->user = $_SESSION['id'];
        }else{
            $this->user = null;
        }
    }

    public function GetRole(){
        $req_n = $this->Connect()->prepare("SELECT * from nounou WHERE Id_identifiant = ?");
        $req_n->execute(array($this->user['Id_identifiant']));
        if($req_n->rowCount() == 0){
            $req_v = $this->Connect()->prepare("SELECT * from parrent WHERE Id_identifiant =?");
            $req_v->execute(array($this->user['Id_identifiant']));
            return "Parent";
        }else{
            return "Nounou";
        }
    }
    public function GetNom(){
        return $this->user['nom'];
    }
    public function GetPrenom(){
        return $this->user['prenom'];
    }

    public function isLogin(){
        if($this->user == null){
            return false;
        }else{
            return true;
        }
    }

    public function Logout(){
        session_destroy();
    }

    public function Login($user){
        $this->user = $user;
        $_SESSION['id'] = $user['Id_identifiant'];
    }

}

?>