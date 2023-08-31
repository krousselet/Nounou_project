<?php
require __DIR__ . '/../Class/Bdd.php';
require __DIR__ . '/../Class/Session.php';
$session = new Session();
$usernameName = $session->GetNom();
$usernameLastName = $session->GetPrenom();
$role = $session->GetRole();
$birthDate = $session->GetNaissance();
$accountCreation = $session->GetInscription();
$tel = $session->GetTel();
?>
<div class="container profil-height d-flex justify-content-center align-items-center">
<div class="card justify-content-end color-font-dark form-log-reg p-4">
    <p class="fs-3 color-font-dark text-shadow">Votre Profil</p>
    <p>Nom d'utilisateur : <?php echo $usernameName ?></p>
    <p>Prénom d'utilisateur : <?php echo $usernameLastName ?></p>
    <p>Date de naissance : <?php echo $birthDate ?></p>
    <p>Date de création du compte : <?php echo $accountCreation ?></p>
    <p>Téléphone : <?php echo $tel ?></p>
    <p>Rôle : <?php echo $role ?></p>
    <!-- <p>Première création du compte :</p> -->
    <button class="btn mdp text-shadow color-font-dark fs-5">Changer de mot de passe</button>
</div></div>    
<div class="chg_pass">
    <form action="" method="post">
        <div class="form-group">
            <label for="opwd">Ancien mot de passe</label>
            <input type="password" class="form-control" id="opwd">
        </div>
        <div class="form-group">
            <label for="pwd">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
        <div class="form-group">
            <label for="pwd_confirm">Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="pwd_confirm" name="pwd_confirm">
        </div>
        <button type="submit" id="pwd_change_confirm" class="btn btn-primary">Changer de mot de passe</button>
    </form>
</div>