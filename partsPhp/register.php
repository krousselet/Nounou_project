<div id="backdrop-filter-connect">

<div id="form-register" class="d-flex flex-column justify-content-center align-items-center mt-3">
  <form method="POST" id="form-register-champ" class="mt-5 card col-10 col-sm-8 col-md-6 col-lg-4">
    <h1 class="text-center ">Enregistrer</h1>
    <input required id="email" placeholder="Email" type="email" name="email" class="fs-4 m-3">
    <input required id="mot-de-passe" placeholder="Mot de passe" type="password" name="mot-de-passe" class="fs-4 m-3">
    <input required id="mot-de-passe-verif" placeholder="Vérifiez mot de passe" type="password" name="mot-de-passe-verif" class="fs-4 m-3">
    <input required id="nom" placeholder="Nom" type="text" min="1000" max="2100" name="nom" class="fs-4 m-3">
    <input required id="prenom" placeholder="Prénom" type="text" name="prenom" class="fs-4 m-3">
    <input required id="naissance" placeholder="Date de naissance" type="date" name="naissance" class="fs-4 m-3">
    <input required id="telephone" placeholder="Numéro de téléphone" type="number" name="telephone" class="fs-4 m-3">
    <select name="role" id="role" class="m-3 fs-4">
      <option value="parent">Parent</option>
      <option value="nounou">Nounou</option>
    </select>
  
  </form>

  <button class="btn btn-success m-3" value="save" id="Register">S'enregistrer</button>
</div>

</div>
