<?php
session_start();
require_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST["id"]) && !empty($_POST["id"])
        && isset($_POST["tendance_name"]) && !empty($_POST["tendance_name"])

    ) {
        $id = strip_tags($_POST["id"]);
        $tendance_name = $_POST["tendance_name"];

        $sql = "UPDATE tendance SET tendance_name = :tendance_name 
        WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":tendance_name", $tendance_name, PDO::PARAM_STR);

        $query->execute();

        header("Location: admin_dashboard.php");
    } else {
        echo "Remplissez TOUS les formulaires SVP !";
    }
}

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM tendance WHERE id = :id";

    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $user = $query->fetch();

    if (!$user) {
        header("Location: admin_dashboard.php");
    }
} else {
    header("Location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire_tendance</title>
</head>

<body>
    <h1>Modifier <?= $user["tendance_name"] ?>:</h1>
    <form method="post">
        <label for="tendance_name">Nom de la tendance :</label>
        <br>
        <input type="text" name="tendance_name" value="<?= $user["tendance_name"] ?>" required>
        <br>
        <input type="hidden" name="id" value="<?= $user["id"] ?>" required>
        <br>
        <br>
        <button>Modifier</button>
    </form>
    <br>
    <a href="admin_dashboard.php">Retour</a>
    <?php
    // print_r($_POST);
    ?>
</body>

</html>