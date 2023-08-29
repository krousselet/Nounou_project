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