<div id="backdrop-filter-connect">

<div id="form-register" class="d-flex flex-column justify-content-center align-items-center mt-2">
  <form method="POST" id="form-register-champ" class="form-log-reg mt-2 card col-10 col-sm-8 col-md-6 col-lg-4">
    <h1 class="text-center mt-2 mb-2">Créer un nouveau compte</h1>
    <label class="register-label">Adresse Mail</label>
    <input required id="email" placeholder="Email" type="email" name="email" class="fs-5 register-input">
    <label class="register-label">Mot de passe</label>
    <input required id="mot-de-passe" placeholder="Mot de passe" type="password" name="mot-de-passe" class="fs-5 register-input">
    <label class="register-label">Retapez votre mot de passe</label>
    <input required id="mot-de-passe-verif" placeholder="Vérifiez mot de passe" type="password" name="mot-de-passe-verif" class="fs-5 register-input">
    <label class="register-label">Nom</label>
    <input required id="nom" placeholder="Nom" type="text" min="1000" max="2100" name="nom" class="fs-5 register-input">
    <label class="register-label">Prénom</label>
    <input required id="prenom" placeholder="Prénom" type="text" name="prenom" class="fs-5 register-input">
    <label class="register-label">Date de naissance</label>
    <input required id="naissance" placeholder="Date de naissance" type="date" name="naissance" class="fs-5 register-input">
    <label class="register-label">Numéro de téléphone</label>
    <input required id="telephone" placeholder="Numéro de téléphone" type="text" name="telephone" class="fs-5 register-input">
    <label class="register-label">Vous êtes :</label>
    <select name="role" id="role" class=" fs-5 register-input">
      <option value="parent">Parent</option>
      <option value="nounou">Nounou</option>
    </select>
    <button class="btn btn-custom-color m-3" value="save" id="Register">S'enregistrer</button>
  </form>
</div>
</div>
