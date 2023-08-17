<?php
// $mail = new Mail();

// $mail->sendEmail('shaefferaelita@gmail.com','test','test');
?>

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

<?php require __DIR__.'/../partsPhp/register.php';?>

