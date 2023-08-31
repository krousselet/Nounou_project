<div id="bienvenu" class="text-center mt-4 slide-bottom col-12">Bienvenu</div>

<div class="container d-flex flex-column justify-content-center align-items-center accueil-welcome-box">

  <!-- Bloc Image Texte Welcome -->
  <div class="accueil-text-welcome accueil-text-box d-flex justify-content-center mt-2 mb-4 flex-wrap">
    <div class="accueil-text-welcome-text accueil-triple-text card col-lg-5 col-12">
      Qu'il s'agisse de simplifier la vie des parents occupés ou d'offrir aux
      nounous les outils pour réussir, <b>Nounou Projet X</b> est le partenaire
      idéal pour une garde d'enfants efficace et bienveillante. Rejoignez-nous
      dès aujourd'hui et découvrez une nouvelle façon de gérer la garde
      d'enfants !
    </div>
    <img class="accueil-img col-lg-6 col-12 shadow-pop-tr-left " src="./img/couch-family.jpg" alt="" />
  </div>


  <!-- Bloc Image + Parent -->
  <div class="accueil-text-box accueil-parent-box d-flex justify-content-center align-items-center flex-row-reverse flex-wrap  mt-4">
    <div class="accueil-text-main-text col-lg-4 col-12">Pour les parents</div>

    <img class="accueil-img  col-lg-6 col-12 shadow-pop-tl-right" src="./img/nice-house.jpg" alt="" />
  </div>

  <!-- Bloc 3 Box Texte Parent -->
  <div class="col-12 d-flex text-center align-items-center mb-4 accueil-triple-box flex-wrap">
    <div class="accueil-triple-text card col-lg-3 col-12 mt-2">
      Simplifiez la parentalité avec notre plateforme : besoins de garde
      facilités, nounous compétentes à proximité, gestion fluide et suivi
      transparent pour le bien-être de vos enfants
    </div>
    <div class="accueil-triple-text card col-lg-3 col-12 mt-2">
      Confiez vos trésors en toute sérénité grâce à notre réseau de nounous
      fiables. Sélectionnez la personne idéale pour veiller sur vos enfants, en
      parcourant profils, avis et disponibilités
    </div>
    <div class="accueil-triple-text card col-lg-3 col-12 mt-2">
      Optimisez la garde d'enfants en ligne : planification, notifications et
      gestion simplifiée grâce à notre plateforme intuitive. Fini les tracas,
      place à une gestion efficace !
    </div>
  </div>



  <!-- Bloc Image/ Titre Nounou -->
  <div class="mt-4 d-flex justify-content-center align-items-center accueil-text-box flex-wrap">
    <div class="accueil-text-main-text col-lg-4 col-12">Pour les nounous</div>

    <img class="accueil-img  col-lg-6 col-12 shadow-pop-tr-left" src="./img/kids-tree.jpg" alt="" />
  </div>

  <!-- Bloc 3 Texte Nounou -->
  <div class="d-flex text-center align-items-center mb-4 accueil-triple-box flex-wrap">

    <div class="accueil-triple-text card  col-lg-3 col-12 mt-2">
      Rejoignez une communauté valorisant votre travail en tant que nounou.
      Accédez aux meilleures opportunités, gérez votre emploi du temps,
      établissez des liens avec les familles et simplifiez votre facturation
    </div>
    <div class="accueil-triple-text card col-lg-3 col-12  mt-2">
      Prenez les rênes de votre carrière de nounou : contrôlez horaires,
      missions et relations avec les parents grâce à notre interface conviviale,
      pour des expériences de garde exceptionnelles
    </div>
    <div class="accueil-triple-text card col-lg-3 col-12  mt-2">
      Gérez, gardez, gagnez : notre plateforme simplifie la gestion, la
      communication et les factures pour que vous puissiez vous concentrer sur
      une garde attentionnée et de qualité
    </div>


  </div>

</div>

<!-- Deux Cards de Connexions/Enregistrer -->
<?php
if (!isset($_SESSION['Id'])) { ?>
  <div class="container d-flex btns-accueil align-items-center justify-content-center flex-wrap">
    <div class="card form-log-reg" style="width: 24rem">
      <img src="./img/parent-kids.png" class="card-img-top" alt="..." />
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title mb-4">Vous possédez déjà un compte ?</h5>
        <a href="#" class="btn btn-custom-color btn-accueil-connect">Se connecter</a>
      </div>
    </div>

    <div class="card form-log-reg justify-content-center align-items-center" style="width: 24rem">
      <img src="./img/parent.png" class="card-img-top" alt="..." />
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title mb-4">Pas encore de compte ?</h5>
        <a href="#" class="btn btn-custom-color btn-accueil-register">Créer un compte</a>
      </div>
    </div>
  </div>
<?php
}
?>