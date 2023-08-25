<?php

class Dashboard extends Bdd{

    public function __construct(){

    }

    private function Parent() {
        echo "<div class='role-container'>";
        echo "<button class='btn_d_listChild btn btn-custom-color'>List des enfant</button>";
        echo "<button class='btn_d_addChild btn btn-custom-color'>Ajouter un enfant</button>";
        echo "<button class='btn_d_DispoNounou btn btn-custom-color'>Disponibilité des nounous</button>";
        echo "</div>";
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
    private function listChild($id){
        $req = $this->Connect()->prepare("SELECT * FROM enfants where Id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function PrintlistChilds(int $id){
        return $this->listChild($id);
    }

    private function Nounou() {
        echo "<div class='role-container'>";
        echo "<button class='btn_d_Charge btn btn-custom-color'>Enfants a charge</button>";
        echo "<button class='btn_d_calendar btn btn-custom-color'>Agenda</button>";
        echo "<button class='btn_d_addChild btn btn-custom-color'>Ajouter un enfant</button>";
        echo "<button class='btn_d_Facture btn btn-custom-color'>Facture</button>";
        echo "</div>";
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
    public function AddCalendar($start, $end, $date_in, $repeat, $date_out = null){
        $req = $this->Connect()->prepare("INSERT INTO disponibilités (heure_debut, heure_fin, jour_start, jour_end, repeater, Id) VALUES (:start, :end, :date_in, :date_out, :repeat, :parent_id)");
        $req->bindValue(':start', $start);
        $req->bindValue(':end', $end);
        $req->bindValue(':date_in', $date_in);
        $req->bindValue(':date_in', $date_in);
        $req->bindValue(':date_in', $date_in);
        $req->bindValue(':date_out', $date_out);
        if($repeat == "on"){
            $repeat = true;
        }else{
            $repeat = false;
        }
        $req->bindValue(':repeat', $repeat);
        $session = new Session();
        $parent_id = $session->GetId();
        $req->bindValue(':parent_id', $parent_id);
        $req->execute();
        return true;
    }
    public function getCalendar(){
        $req = $this->Connect()->prepare("SELECT * FROM disponibilités WHERE Id = :parent_id");
        $session = new Session();
        $parent_id = $session->GetId();
        $req->bindValue(':parent_id', $parent_id);
        $req->execute();
        return $req->fetchAll();
    }
    private function getDisponibility(){
        $req = $this->Connect()->prepare("SELECT S.*,I.nom,I.prenom FROM disponibilités AS S INNER JOIN identifiant AS I ON S.Id = I.Id WHERE S.Jour_end IS NULL OR S.Jour_end > NOW()");
        $req->execute();
        return $req->fetchAll();
    }
    public function printDisponibility(){
        return $this->getDisponibility();
    }
    private function getIdFromDisponibility($id){
        $req = $this->Connect()->prepare("SELECT Id FROM disponibilités WHERE Id_Disponibilités = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        return $req->fetch();
    }

    public function addReservation($id,$week,$children){
        $nounouid = $this->getIdFromDisponibility($id);
        $req = $this->Connect()->prepare("INSERT INTO reservations ()");
    }
}