<?php 

class Session extends Bdd{

    private $user;

    public function __construct(){
        session_start();
        if(isset($_SESSION['id'])){
            $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE Id_identifiant = ?");
            $req->execute(array($_SESSION['id']));
            $this->user = $req->fetch();
            $this->user = $_SESSION['id'];
        }else{
            $this->user = null;
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

}

?>

<html>
<?php if(!empty($username)) { ?>
    <a href="" class="">ICI</a>
    <a href="">LA</a>

<?php }?>
</html>