<?php
require_once './partsPhp/header.php';
var_dump($_POST);
$session = new Session();
// $mail = new Mail();

// $mail->sendEmail('shaefferaelita@gmail.com','test','test');


?>

<html>
  <head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>I'm IN</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/style/style.scss" />
    <link rel="icon" href="favicon.ico" type="image/x-icon">


</head>

<body class="">

  <form>
    
      <button class="btn btn-danger m-3" value="logout" type="submit" name="logoutbtn">Log Out</button>

  </form>
  

  <div class="container d-flex justify-content-center align-items-center">

  <div class="searchBars d-flex flex-column col-4 m-5">
  <h1>Connexion</h1>

  <form method="POST" class="d-flex flex-column ">

 <label for="title">Mail</label>
 <input  type="text" id="mail-connect" name="mail-connect" >

 <label for="author">Mot de passe</label>
 <input  type="text" id="mdp-connect" name="mdp-connect" >

</form>

<button id="btnSearch"  class="btn btn-success m-3" value="search" onclick="getFullBook()" name="searchBook">Search</button>
 

  <div class="result-menu result-menu-title flex-column"></div>
  <div class="result-menu result-menu-author  flex-column"></div>
  <div class="result-menu result-menu-releasedate  flex-column"></div>
  <div class="result-menu result-menu-editor  flex-column"></div>

  </div>


<div id="form-register" class="d-flex flex-column">
  <form method="POST" id="form-enregistrer" class="mt-5 col-6 card bg-light">
  <h1>Enregistrer</h1>
  <input required id="email" placeholder="email" type="email" name="email" class="fs-4 m-3">
  <input required id="mot-de-passe" placeholder="mot de passe" type="text" name="mot-de-passe" class="fs-4 m-3">
  <input required id="mot-de-passe-verif" placeholder="mot de passe Vérif" type="text" name="mot-de-passe-verif" class="fs-4 m-3">
  <input required id="nom" placeholder="Nom" type="text" min="1000" max="2100" name="nom" class="fs-4 m-3">
  <input required id="prenom" placeholder="prénom" type="text" name="prenom" class="fs-4 m-3">
  <input required id="naissance" placeholder="date de naissance" type="date" name="naissance" class="fs-4 m-3">
  <select name="role" id="role">
    <option value="parent">parent</option>
    <option value="nounou">nounou</option>
  </select>
  
</form>
<button class="btn btn-success m-3" value="save" id="saveBook">Save to Data Base</button>

</div>


  </div>


<script type="module" src="/js/app.js"></script>

</body>
</html>