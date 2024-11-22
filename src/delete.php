<?php
// On verifie qu' il ya bien un id dans l'url et que l'utilisateur correspondant existe
// On vérifie qu'il y a bien un id dans l'url et que l'utilisateur correspondant existe
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");
    $id = strip_tags($_GET["id"]);

    // Suppression pour la table 'product'
    $sql = "SELECT * FROM product WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $product = $query->fetch();

    if ($product) {
        $sql = "DELETE FROM product WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    // Suppression pour la table 'tendance'
    $sql = "SELECT * FROM tendance WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $tendance = $query->fetch();

    if ($tendance) {
        $sql = "DELETE FROM tendance WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $users = $query->fetch();

    if ($product) {
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    header("Location: admin_dashboard.php");
} else {
    header("Location: index.php");
}
