<?php 

class Session extends Bdd{

    private $user = null;

    public function __construct(){
        //check if session start
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['Id'])){
            $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE Id = ?");
            $req->execute(array($_SESSION['Id']));
            // $req->execute(array("1"));
            $this->user = $req->fetch();
            // $this->user = $_SESSION['id'];
        }else{
            $this->user = null;
        }
    }

    public function GetRole(){
        return $this->user['role'];
    }
    public function GetNom(){
        return $this->user['nom'];
    }
    public function GetPrenom(){
        return $this->user['prenom'];
    }
    public function GetId(){
        return $this->user['Id'];
    }
    public function GetTel(){
        return $this->user['tel'];
    }
    public function GetInscription(){
        return $this->user['date_inscription'];
    }
    public function GetNaissance(){
        return $this->user['date_naissance'];
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
        $_SESSION['Id'] = $user['Id'];
    }

    private function testloacalpass($passtest){
        if(password_verify("Panda".$passtest."Town", $this->user['mot_de_passe'])){
            return true;
        }else{
            return false;
        }
    }
    private function changepass($new,$id){
        $req = $this->Connect()->prepare("UPDATE identifiant SET mot_de_passe = ? WHERE Id = ?");
        $hashedPassword = password_hash($new, PASSWORD_DEFAULT);
        $req->execute(array($hashedPassword,$id));
        return $hashedPassword;
    }

    public function ChangePasswordProfile($new,$old = null){
        if($old != null){
            if(!$this->testloacalpass($old)){
                return "password incorrect";
            }else{
                return $this->changepass($new,$this->user['Id']);
            }
        }
    }

}

?>