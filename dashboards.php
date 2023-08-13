<?php
require_once __DIR__.'/partsPhp/header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <div class="happy-body-container">
    <img src="./img/dashboard/happy-body.svg"
     class="moving-rect happy-body"
     alt="image d'une personne les bras ouverts"
     srcset="./img/dashboard/happy-body-desktop.svg 2048w"
     sizes="(max-width: 2048px) 100vw, 50vw">
        <div class="blur">
            <div class="form-container">
            <form>
                <label for="email" class="fade">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password" class="fade">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit" class="styled-button">
                    <span>Valider</span>
                </button>
                <button type="submit" class="styled-button">
                    <span>Mot de passe oublié ?</span>
                </button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>