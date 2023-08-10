<?php
require_once './partsPhp/header.php';

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

</head>

<body class="">

  <form>
    
      <button class="btn btn-danger m-3" value="logout" type="submit" name="logoutbtn">Log Out</button>

  </form>
  

  <div class="container d-flex justify-content-center align-items-center">

  <div class="searchBars d-flex flex-column col-4 m-5">
  <h1>Connexion</h1>

  <form method="GET" class="d-flex flex-column ">

 <label for="title">Mail</label>
 <input onfocusout="focusOutEventTitle()" type="text" id="titlesearch" name="titleSearch" oninput="getTitle()">

 <label for="author">Mot de passe</label>
 <input onfocusout="focusOutEventAuthor()" type="text" id="authorsearch" name="authorSearch" oninput="getAuthor()">

</form>

<button id="btnSearch"  class="btn btn-success m-3" value="search" onclick="getFullBook()" name="searchBook">Search</button>
 

  <div class="result-menu result-menu-title flex-column"></div>
  <div class="result-menu result-menu-author  flex-column"></div>
  <div class="result-menu result-menu-releasedate  flex-column"></div>
  <div class="result-menu result-menu-editor  flex-column"></div>

  </div>


<div class="d-flex flex-column">
  <form method="GET" id="form" class="mt-5 col-6 card bg-light">
  <h1>Enregistrer</h1>
  <input required id="email" placeholder="email" type="text" name="titlesave" class="fs-4 m-3">
  <input required id="mot-de-passe" placeholder="mot de passe" type="text" name="authorsave" class="fs-4 m-3">
  <input required id="nom" placeholder="Nom" type="number" min="1000" max="2100" name="releasedatesave" class="fs-4 m-3">
  <input required id="prenom" placeholder="prénom" type="text" name="editorsave" class="fs-4 m-3">
  <input required id="naissance" placeholder="date de naissance" type="text" name="editorsave" class="fs-4 m-3">
  <input required id="role" placeholder="role" type="text" name="editorsave" class="fs-4 m-3">
  
</form>
<button class="btn btn-success m-3" value="save" onclick="saveNewBook()" name="saveBook">Save to Data Base</button>

</div>


  </div>


<script src="/js/app.js"></script>

</body>
</html>