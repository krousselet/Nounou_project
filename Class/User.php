<?php


    class User extends Bdd
{

    public function __construct()
    {
        
    }

    protected $email;
    protected $password;
    protected $db;

    public function CreateUser($email, $password, $nom, $prenom, $tel, $dateDeNaissance, $role)
    {
        // Insertion d'un nouvel utilisateur dans la base de données
        //!!! Quel objet instancier, et comment ?
        // $database = new Bdd($this->db);
        // return $database->insertUser($email, $hashedPassword);
        //Obliger le remplissage champs SAUF etat et reset_password

       
        if (empty($email) || empty($password) || empty($nom) || empty($prenom) || empty($tel) || empty($dateDeNaissance) || empty($role)) {
            return false;
        }
        // if($this->get)
        try {
            $tempcode = rand(1000000000, 99999);
            // Préparation de la requête pour insertion dans la base de données
            $stmt = $this->Connect()->prepare("INSERT INTO identifiant (email, mot_de_passe, nom, prenom, date_inscription ,date_naissance, role, tel, temp_code, etat) VALUES (:email, :password, :nom, :prenom, NOW() ,:date_de_naissance, :role, :tel, :temp_code, 0)");
            $stmt->bindParam(':email', $email);
            $hashedPassword = password_hash("Panda".$password."Town", PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':date_de_naissance', $dateDeNaissance);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':temp_code', $tempcode);
            $mail = new Mail();
            $mail->sendEmail($email, "Validation du compte", $tempcode);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            
            return false;
        }
    }
 
    public function getUser($email)
    {
        try {
            $stmt = $this->Connect()->prepare("SELECT * FROM identifiant WHERE email = :email");
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
        // var_dump($user);
        // Vérifier la correspondance entre le mot de passe et son hashage
        if ($user && password_verify("Panda".$password."Town", $user['mot_de_passe'])) {
            //Attribution du nom d'utilisateur comme valeur de session
            
            return $user;
        }

        return false;
    }

}
?>