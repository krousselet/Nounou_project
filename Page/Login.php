<div class="container d-flex justify-content-center align-items-center">

  <div class=" form-log-reg card searchBars d-flex flex-column col-10 col-sm-8 col-md-6 col-lg-4 m-5">
    <h1 class="text-center">Connection</h1>

    <form method="POST" class="d-flex flex-column " id="form-login">

      <label class="connect-label">Adresse Mail</label>
      <input class="connect-input" placeholder="Adresse Mail" type="text" id="mail-connect" name="mail-connect" >

      <label class="connect-label">Mot de passe</label>
      <input class="connect-input" placeholder="Mot de passe" type="password" id="mdp-connect" name="mdp-connect" >
      <a href="reset_password" class="reset_pass" >Mot de pass oublié</a>
      <button id="Login"  class="btn btn-custom-color m-3" value="search" id="Login">Se connecter</button>

    </form>
    <form action="POST" class="d-flex flex-column" id="reset-pass1" style="display: none!important;">
      <label class="connect-label">Adresse Mail</label>
      <input class="connect-input" placeholder="Adresse Mail" type="text" id="mail-reset" name="mail-reset" >
      <button id="Pass1" class="btn btn-custom-color m-3">Envoyé un mail</button>
    </form>

    <form action="POST" class="d-flex flex-column" id="reset-pass2" style="display:none!important;">
        <label for="code">Code Recu par email :</label>
        <input class="connect-input" placeholder="Code" type="text" id="code" name="code" >
        <button id="Pass2" class="btn btn-custom-color m-3">Verifier Code</button>
    </form>

    <form action="POST" class="d-flex flex-column" id="reset-pass3" style="display:none!important;">
        <label for="n_pass1">nouveau mot de pass :</label>
        <input class="connect-input" placeholder="nouveau mot de passe" type="password" id="n_pass1" name="n_pass1" >
        <label for="n_pass2">Confirmer nouveau mot de passe :</label>
        <input class="connect-input" placeholder="Confirmer nouveau mot de passe" type="password" id="n_pass2" name="n_pass2" >
        <button id="Pass3" class="btn btn-custom-color m-3">Changer mot de passe</button>
    </form>
  </div>
</div>