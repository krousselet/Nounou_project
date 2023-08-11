<?php

class Nounou extends Session{
    private $tarifs;

    public function __construct() {
        parent::__construct();
        $req = $this->Connect()->prepare('SELECT * FROM tarif WHERE Id = ?');
        $req->bindValue(1, $_SESSION['id']);
        $req->execute();
        if($req->rowCount() > 0){        
            $this->tarifs = $req->fetch(PDO::FETCH_ASSOC);
        }else{
            echo "Le tarif n'a pas été definie";
        }
    }

    public function getTarif(){
        if(isset($this->tarifs)){
            return $this->tarifs;
        }else{
            return false;
        }
    }

    private function updateAddTarif($newtarif){
        if($this->getTarif() == false){
            $req = $this->Connect()->prepare('INSERT INTO tarif (Id, Tarif) VALUES (?,?)');
            $req->bindValue(1, $_SESSION['id']);
            $req->bindValue(2, $newtarif);
            $req->execute();
        }else{
            $req = $this->Connect()->prepare('UPDATE tarif SET Tarif =? WHERE Id =?');
            $req->bindValue(1, $newtarif);
            $req->bindValue(2, $_SESSION['id']);
            $req->execute();
        }
        return "ok";
    }

    public function setTarif($tarif){
        return $this->updateAddTarif($tarif);
    }

}