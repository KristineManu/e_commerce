<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire_Tendance</title>
</head>

<body>
<?php
  include './element/navbar.php';
  ?>
   <div class="conteneur_login">
<div class="conteneur_form">
    <h2>AJOUTER UNE TENDANCE: </h2>
    <form action="create_tendance.php" method="post">
    <div class="form-login">
        <label for="tendance_name">Nom de la tendance:</label>
        <input type="text" name="tendance_name" required>
  
</div>

    <button class="login-btn"> Ajouter </button>
                   
    </form>
    <br>
    <a href="admin_dashboard.php"><button class="login-btn">Retour</button></a>
</div>
</div>
</body>

</html>