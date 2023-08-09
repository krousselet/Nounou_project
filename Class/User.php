<?php
    class User
{

    public function __construct()
    {
        $database = new Bdd();
        $this->db = $database->Connect();
    }

    protected $email;
    protected $password;
    protected $db;

    public function CreateUser($email, $hashedPassword, $nom, $prenom, $dateDeNaissance, $role, $etat, $resetPassword)
    {
        // Insertion d'un nouvel utilisateur dans la base de données
        //!!! Quel objet instancier, et comment ?
        $database = new Bdd($this->db);
        // return $database->insertUser($email, $hashedPassword);
        try {
            // Préparation de la requête pour insertion dans la base de données
            $stmt = $this->db->prepare("INSERT INTO identifiant (email, password, nom, prenom, date_de_naissance, role, etat, reset_password) VALUES (:email, :password, :nom, :prenom, :date_de_naissance, :role, :etat, :reset_password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':date_de_naissance', $dateDeNaissance);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':reset_password', $resetPassword);
            //Obliger le remplissage champs SAUF etat et reset_password
        if (empty($email) || empty($password) || empty($nom) || empty($prenom) || empty($dateDeNaissance) || empty($role)) {
            return false;
        }

        //Si le mot de passe est invalide
    if (!$this->isPasswordValid($hashedPassword)) {
        return false;
    }
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            
            return false;
        }
    }
 
    public function getUser($email)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM identifiant WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {
    
            return false;
        }
    }

    public function isPasswordValid(string $password): bool
{
    // Vérification pour savoir si le mot de passe contient bien une MAJUSCULE, un CHARACTERE SPECIAL, et un CHIFFRE
    $specialCharPattern = '/[!@#$%^&*]/';
    $uppercasePattern = '/[A-Z]/';
    $numberPattern = '/\d/';

    $hasSpecialChar = preg_match($specialCharPattern, $password);
    $hasUppercase = preg_match($uppercasePattern, $password);
    $hasNumber = preg_match($numberPattern, $password);

    return $hasSpecialChar && $hasUppercase && $hasNumber;
}

    public function login($email, $password)
    {
        //Obliger le remplissage des deux champs
        if (empty($email) || empty($password)) {
            return false;
        }

        //Récupérer l'utilisateur dans la base de données
        $user = $this->getUser($email);

        // Vérifier la correspondance entre le mot de passe et son hashage
        if ($user && password_verify($password, $user['password'])) {
            //Attribution du nom d'utilisateur comme valeur de session
            $_SESSION['username'] = $user['email'];
            return true;
        }

        return false;
    }

}
?>