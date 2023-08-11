<?php
require_once './partsPhp/header.php';
var_dump($_POST);
$session = new Session();
?> <script type="module">
          import { panda } from 'https://pandatown.fr/lib/pandalib.php';

panda.util.log('<?php echo $session->isLogin(); ?>','orange');
<?php
if($session->isLogin()){?>

        panda.util.log('<?php echo $session->GetNom(); ?>','orange');
      
<?php } ?> </script> <?php
// $mail = new Mail();

// $mail->sendEmail('shaefferaelita@gmail.com','test','test');
?>

<<<<<<< HEAD
  <form>
    
      <button class="btn btn-danger m-3" value="logout" type="submit" name="logoutbtn" id="Logout">Log Out</button>

  </form>
  

  <div class="container d-flex justify-content-center align-items-center">

  <div class="searchBars d-flex flex-column col-4 m-5">
  <h1>Connexion</h1>

  <form method="POST" class="d-flex flex-column" id="form-login">

    <label for="title">Mail</label>
    <input  type="text" id="mail-connect" name="mail-connect" >

    <label for="author">Mot de passe</label>
    <input  type="text" id="mdp-connect" name="mdp-connect" >

  </form>

<button class="btn btn-success m-3" value="search" id="Login">Search</button>
 

  <div class="result-menu result-menu-title flex-column"></div>
  <div class="result-menu result-menu-author  flex-column"></div>
  <div class="result-menu result-menu-releasedate  flex-column"></div>
  <div class="result-menu result-menu-editor  flex-column"></div>

  </div>


<div id="form-register" class="d-flex flex-column">
  <form method="POST" id="form-enregistrer" class="mt-5 card bg-light">
  <h1>Enregistrer</h1>
  <input required id="email" placeholder="email" type="email" name="email" class="fs-4 m-3">
  <input required id="mot-de-passe" placeholder="mot de passe" type="password" name="mot-de-passe" class="fs-4 m-3">
  <input required id="mot-de-passe-verif" placeholder="mot de passe Vérif" type="password" name="mot-de-passe-verif" class="fs-4 m-3">
  <input required id="nom" placeholder="Nom" type="text" min="1000" max="2100" name="nom" class="fs-4 m-3">
  <input required id="prenom" placeholder="prénom" type="text" name="prenom" class="fs-4 m-3">
  <input required id="naissance" placeholder="date de naissance" type="date" name="naissance" class="fs-4 m-3">
  <input type="tel" name="tel" id="tel" class="fs-4 m-3">
  <select name="role" id="role" class="fs-4 m-3">
    <option value="parent">parent</option>
    <option value="nounou">nounou</option>
  </select>
  
</form>
<button class="btn btn-success m-3" value="save" id="Register">Save to Data Base</button>

</div>


  </div>
=======
<?php require_once './partsPhp/register.php';?>
>>>>>>> b0739064da3c6d320d947bd9b6d6cd8c837f6a62





<?php
require_once './partsPhp/footer.php';

?>




