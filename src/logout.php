<?php
session_start(); // Démarrage de la session
session_unset(); // Suppression des variables de session
session_destroy(); // Destruction de la session
header("Location: index.php"); // Redirection vers la page de connexion
exit; // Assure-toi d'appeler exit après une redirection pour arrêter l'exécution du script
