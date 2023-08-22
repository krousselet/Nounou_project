<?php

class Dashboard extends Bdd{

    public function __construct(){

    }

    private function Parent() {
        echo "<button class='btn_d_addChild'>Ajouter un enfant</button>";
    }

    private function addChildBdd(string $nom, string $prenom, int $age, int $prix = null, int $parent_id = null){
        $req = $this->Connect()->prepare("INSERT INTO enfants (nom, prenom, age, Tarif_h, id) VALUES (:nom, :prenom, :age, :prix, :parent_id)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':age', $age);
        if($prix == null){
            $req->bindValue(':prix', 0);
        }else{
            $req->bindValue(':prix', $prix);
        }
        $req->bindValue(':parent_id', $parent_id);
        $req->execute();
        return true;
    }

    public function addChild(string $nom, string $prenom, int $age, int $prix = null, int $parent_id = null){
        $this->addChildBdd($nom, $prenom, $age, $prix, $parent_id);

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
        echo "<h2>Bienvenue $nom $prenom </h2>";
        if($session->GetRole() == "nounou"){
            $this->Nounou();
        }else{
            $this->Parent();
        }
        echo "</div>";
    }

}