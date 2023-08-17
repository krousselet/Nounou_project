<?php

abstract class Bdd {
    private $ip = 'localhost';
    private $port = '';
    private $user = 'nounou';
    private $pass = 'root';
    private $db = 'nounou';

    public function Connect(){
        try {
            $pdo = new PDO("mysql:host=$this->ip;port=$this->port;dbname=$this->db", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch ( PDOException $th ) {
            return new Exception ($th->getMessage());
        }
    }

    public function Close($pdo){
        $pdo->close();
        return true;
    }
}