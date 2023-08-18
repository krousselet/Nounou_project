<?php

class Dashboard extends Bdd{

    public function __construct(){

    }

    private function Parent() {
        
    }

    private function Child() {
        
    }
    private function Nounou() {
        echo 
    }

    public function index(){
        $session = new Session();
        $nom = $session->GetNom();
        $prenom = $session->GetPrenom();
        echo "<div class='Dashboard'>";
        echo "<h2>Bienvenue $nom $prenom <h2>";
        if($session->GetRole() == "nounou"){
            $this->Nounou();
        }else{

        }
        echo "</div>";
    }

}