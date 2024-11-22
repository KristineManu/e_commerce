<?php
// On demarre une session 
session_start();
if (
    isset($_POST["tendance_name"]) && !empty($_POST["tendance_name"])


) {
    require_once("connect.php");
    $tendance_name = $_POST["tendance_name"];


    $sql = "INSERT INTO tendance (tendance_name)
VALUES (:tendance_name)";

    $query = $db->prepare($sql);

    $query->bindValue(":tendance_name", $tendance_name);


    $query->execute();

    $_SESSION["message"] = "Article ajouté";
    header("Location: admin_dashboard.php");
} else {
    echo "Veulliez remplir TOUS les formulaires !";
}
