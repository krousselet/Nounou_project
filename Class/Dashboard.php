<?php

class Dashboard extends Bdd{

    public function __construct(){

    }

    private function Parent() {
        echo "<button class='btn_d_addChild'>Ajouter un enfant</button>";
    }

    private function Child() {
        
    }

    private function Nounou() {
        echo "<button class='btn_d_Charge'>Enfant a charge</button>";
        echo "<button class='btn_d_calendar'>Agenda</button>";
        echo "<button class='btn_d_addChild'>Ajouté un enfant</button>";
        echo "<button class='btn_d_Facture'>Facture</button>";
    }

    public function Display(){
        $session = new Session();
        $nom = $session->GetNom();
        $prenom = $session->GetPrenom();
        echo "<div class='Dashboard'>";
        echo "<h2>Bienvenue $nom $prenom <h2>";
        if($session->GetRole() == "nounou"){
            $this->Nounou();
        }else{
            $this->Parent();
        }
        echo "</div>";
    }

}