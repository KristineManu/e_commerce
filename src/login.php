<?php
session_start(); // Démarrage de la session

if (!empty($_SESSION["message"])) {
    echo "<p>" . $_SESSION["message"] . "</p>";
    $_SESSION["message"] = "";
}

// Connexion à la base de données
require_once("connect.php");



// Vérification si les données du formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparation de la requête pour récupérer l'utilisateur par son nom d'utilisateur
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Récupération de l'utilisateur
    $email = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($email && password_verify($password, $email['password'])) {
        // Si le mot de passe est correct, création de la session utilisateur
        $_SESSION['admin'] = $email['admin'];

        // $_SESSION["email"] = 

        // Redirection vers la page protégée ou affichage d'un message de succès
        $_SESSION["message"] = "Connexion réussie.";
        if ($_SESSION['admin'] === 1) {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: index.php");
        }
    } else {
        // Si le mot de passe est incorrect ou l'utilisateur n'existe pas
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>S&M </title>
</head>
<body>
<?php
  include './element/navbar.php';
  ?>
   

<!-- Formulaire de connexion -->
<div class="login">
    <div class="login__form-container">
        <form class="login__form"  method="post" action="login.php">
          <h1 class="login__title">Déjà client ?</h1>
          <p class="login__text">Connectez-vous ici pour poursuivre votre shopping!</p>

          <input class="login__input" type="text" name="email" placeholder="email" required />
          <input class="login__input" type="password" name="password" placeholder="mot de passe" required />
          <input class="login__submit" type="submit" value="Se connecter" />
        </form>

        <div class="login__form">
          <h1>Nouveau client ?</h1>
          <div  class='login_icon'><img src="./img/icon/icons8-colis-25.png" alt="icon_colis">
          <p class="login__text">Suivez et gérez vos commandes</p>
          </div>
          <div class='login_icon'><img src="./img/icon/icons8-remise-25.png" alt="icon_remis">
          <p class="login__text">Restez informé de nos bon plans & ventes privées</p>
          </div>
          <div class='login_icon'><img src="./img/icon/icons8-cadeau-25.png" alt="icon_cadeau">
          <p class="login__text">Et pleins d'autres surprises</p>
          
          </div>
          <div>
          <a class="login__submit" href="../inscription.php">Créer un compte</a>
            </div>
        </div>
    </div>
</div>

<?php
  include './element/footer.php';
  ?>   
<script src="script.js"></script>
</body>