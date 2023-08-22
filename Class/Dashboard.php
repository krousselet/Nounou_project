<?php

class Dashboard extends Bdd{

    public function __construct(){

    }

    private function Parent() {
        echo "<div class='role-container'>";
        echo "<button class='btn_d_addChild btn btn-custom-color'>Ajouter un enfant</button>";
        echo "</div>";
    }

    private function Child() {
        
    }

    private function Nounou() {
        echo "<div class='role-container'>";
        echo "<button class='btn_d_Charge btn btn-custom-color'>Enfant a charge</button>";
        echo "<button class='btn_d_calendar btn btn-custom-color'>Agenda</button>";
        echo "<button class='btn_d_addChild btn btn-custom-color'>Ajouté un enfant</button>";
        echo "<button class='btn_d_Facture btn btn-custom-color'>Facture</button>";
        echo "</div>";
    }

    public function Display(){
        $session = new Session();
        $nom = $session->GetNom();
        $prenom = $session->GetPrenom();
        echo "<div class='Dashboard'>
        <h2>Bienvenue $nom $prenom </h2>
        </div>";
        if($session->GetRole() == "nounou"){
            $this->Nounou();
        }else{
            $this->Parent();
        }
        
    }

}