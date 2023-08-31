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

       
        if (empty($email) || empty($password) || empty($nom) || empty($prenom) || empty($tel) || empty($dateDeNaissance) || empty($role)) {
            return false;
        }
        // if($this->get)
        try {
            $tempcode = rand(1000000000, 99999);
            // Préparation de la requête pour insertion dans la base de données
            $stmt = $this->Connect()->prepare("INSERT INTO identifiant (email, mot_de_passe, nom, prenom, date_inscription ,date_naissance, role, tel, temp_code, etat) VALUES (:email, :password, :nom, :prenom, NOW() ,:date_de_naissance, :role, :tel, :temp_code, 0)");
            $stmt->bindParam(':email', $email);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);;
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
            return "remplissez les champs";
        }

        //Récupérer l'utilisateur dans la base de données
        $user = $this->getUser($email);
        // var_dump($user);
        // var_dump(password_verify($password, $user['mot_de_passe']));
        // Vérifier la correspondance entre le mot de passe et son hashage
        if (password_verify($password, $user['mot_de_passe'])) {
            return $user;
        }else{
            return "password incorrect";
        }
    }
    public function reset_sendmail($email){
        $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if($user) {
            $mail = new Mail();
            $newcode = rand(1000000000, 99999);
            $mail->sendEmail($email, "Réinitialisation du mot de passe", $newcode);
            $req = $this->Connect()->prepare("UPDATE identifiant SET temp_code = :temp_code WHERE Id = :Id");
            $req->bindParam(':temp_code', $newcode);
            $req->bindParam(':Id', $user['Id']);
            $req->execute();
            return "true";
        }else{
            return "email invalide";
        }
    }
    public function reset_checkCode($email, $code){
        $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE email = :email AND temp_code = :temp_code");
        $req->bindParam(':email', $email);
        $req->bindParam(':temp_code', $code);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if($user) {
            return "true";
        }else{
            return "code invalide";
        }
    }
    public function reset_password($email, $code, $newpass){
        $req = $this->Connect()->prepare("SELECT * FROM identifiant WHERE email = :email AND temp_code = :temp_code");
        $req->bindParam(':email', $email);
        $req->bindParam(':temp_code', $code);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req = $this->Connect()->prepare("UPDATE identifiant SET mot_de_passe = :passwords , temp_code = 0 WHERE Id = :Id");
        $hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);
        $req->bindParam(':passwords', $hashedPassword);
        $req->bindParam(':Id', $user['Id']);
        $req->execute();
        return "true";
    }
}
?>